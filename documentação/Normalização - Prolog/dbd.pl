%***************************************************************************
% xplus computes the closure of a set of attributes with respect to R and F
%
% xplus(R,F,X,XPLUS) is true iff XPLUS is the closure of X wrt R and F.
%
% input:  R,F, and X
% output: XPLUS
%***************************************************************************
xplus(R,F,X,XPLUS) :- 
  xph(R,F,X,X,[],XP),
  mergesort(XP,XPLUS).

xph(_,_,_,T,T,T) :- !.
xph(R,F,X,Tnew,_,XPLUS) :- 
  onepass(R,F,X,Tnew,S),
  xph(R,F,X,S,Tnew,XPLUS).

onepass(_,[],_,S,S) :- !.
onepass(R,[[U,V]|L],X,T,F) :- 
  subset(T,U), !, 
  union(T,V,T1),
  onepass(R,L,X,T1,F).
onepass(R,[[_,_]|L],X,T,F) :- 
  onepass(R,L,X,T,F).

%***************************************************************************
% finfplus checks to see if a FD is in the closure of a set of FDs
%
% finfplus(R,F,[X,Y]) is true if FD, X --> Y belongs to the closure of
% F with respect to R. X and Y are lists of attributes.
%
% input:  R, F, and [X,Y]
% output: Yes/No
%
%***************************************************************************
finfplus(R,F,[X,Y]) :- 
  xplus(R,F,X,Z),
  subset(Z,Y).

%***************************************************************************
%
% fplus(R,F,FPLUS) is true if FPLUS is the closure of F wrt R.
% 
% input:  R, F
% output: FPLUS
%
%**************************************************************************
fplus(R,F,FPLUS) :- 
  setof(FD,onefinfplus(R,F,FD),FPLUS).

onefinfplus(R,F,[X,Y]) :- 
  subset(R,X),
  subset(R,Y),
  \+ (subset(X,Y)),
  finfplus(R,F,[X,Y]).

%***************************************************************************
% 
% implies(R,F1,F2) is true if the set of FDs F1 logically implies
% the set of FDs F2.
%
% equiv(R,F1,F2) is true if the sets of FDs F1 and F2 are logically
% equivalent.
%
% input:  R, F1, F2
% output: Yes/No
% 
%***************************************************************************
implies(_,_,[]).
implies(R,F,[[X,Y]|L]) :- 
  xplus(R,F,X,Z),
  subset(Z,Y),
  implies(R,F,L).

equiv(R,F1,F2) :- 
  implies(R,F1,F2),
  implies(R,F2,F1).

%***************************************************************************
%
% superkey(R,F,K) is true if K is a super key of R given FDS F.
% candkey(R,F,K) is true if K is a candidate key of R given FDs F
% 
% could be used to generate super keys/candidate keys as well as 
% test if K is a super key or a candidate key.
%
%***************************************************************************
superkey(R,F,K) :- 
  subset(R,K),
  xplus(R,F,K,R1),
  mergesort(R,R1).

candkey(R,F,K) :- 
  superkey(R,F,K),
  setof(K1,(subset(K,K1),\+ (subset(K1,K))),S),
  ckey_check(R,F,S).

ckey_check(_,_,[]).
ckey_check(R,F,[K1|L]) :- 
  \+ (superkey(R,F,K1)),
  ckey_check(R,F,L).

%***************************************************************************
mincover(R,F,FC):-
  decompose(F,[],FD),
  totalPass(R,F,FD,[],FX),
  unionRule(FX,[],FY),
  mergesort(FY,FC).

% remove the redundant rule and extraneous attributes.
% if the result of last step and new step are the same, it's done!
totalPass(_,_,X,Y,FC):-mergesort(X,FC),mergesort(Y,FC).
totalPass(R,F,OldFC,_,FC):-
                 onePass2(R,F,OldFC,OldFC,OldFC,OldFC,FCTemp),
                 totalPass(R,F,FCTemp,OldFC,FC).
% one pass: check all of the rules,
% remove the redundant rule or attributes.
onePass2(R,F,[[U,V]|LBig],[[U,V]|L],OldFC,_,FC):-
             equiv(R,LBig,F),append(LBig,[[U,V]],X),
             onePass2(R,F,X,L,OldFC,LBig,FC).
onePass2(R,F,[[U,V]|LBig],[[U,V]|L],OldFC,NewFC,FC):-
             \+ equiv(R,LBig,F),append(LBig,[[U,V]],X),
             onePass2(R,F,X,L,OldFC,NewFC,FC).
onePass2(R,F,[[U,V]|LBig],[[U,V]|L],OldFC,NewFC,FC):-
        length(U,M),M@>1,checkLeft(R,F,[[U,V]|LBig],U,OldFC,NewFC,FCH),
        append(LBig,[[u,v]],X),
        onePass2(R,F,X,L,OldFC,FCH,FC).
onePass2(_,_,_,[],_,X,X).

%check left extraneous attributes
checkLeft(R,F,[[[X|L],V]|L2],[X|L3],OldFC,_,FC):-
             equiv(R,[[L,V]|L2],F),append(L,[X],X2),
             checkLeft(R,F,[[X2,V]|L2],L3,OldFC,[[L,V]|L2],FC).
checkLeft(R,F,[[[X|L],V]|L2],[X|L3],OldFC,NewFC,FC):-
             \+ equiv(R,[[L,V]|L2],F),append(L,[X],X2),
             checkLeft(R,F,[[X2,V]|L2],L3,OldFC,NewFC,FC).
checkLeft(_,_,_,[],_,X,X).

% decompose right side of the rules to one element
decompose([[U,[X|L1]]|L2],L3,FD):- decompose([[U,L1]|L2],[[U,[X]]|L3],FD).
decompose([[_,[]]|L2],L3,FD):- decompose(L2,L3,FD).
decompose([],L3,L3).

% if the left side of FDs is not unique, union the FDs.
unionRule([[U,V1],[U,V2]|L],F1,FU):-union(V1,V2,V),unionRule([[U,V]|L],F1,FU).
unionRule([[U1,V1],[U2,V2]|L],F1,FU):-U1\==U2,
                                unionRule([[U2,V2]|L],[[U1,V1]|F1],FU).
unionRule([[U,V]],F1,FU):-append([[U,V]],F1,FU).


%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%threenf(R,F,R3NF) :- .

threenf(R,F,R3NF):-
          mincover(R,F,FC),
          threenf2(FC,[],R2),
          addCandidate(R,F,R2,R3NF).

% check each FD, if it is not included in schemas R, then add it in R.
threenf2([[U,V]|L],R1,R2):-
          checkContain([U,V],R1),
          threenf2(L,R1,R2).
threenf2([[U,V]|L],R1,R2):- \+ checkContain([U,V],R1),
                           union(U,V,W),append(R1,[W],X),
                           threenf2(L,X,R2).
threenf2([],R1,R1).

% check the schemas R includes the FD attributes or not
checkContain([U,V],[X|_]):-union(U,V,W),subset(X,W).
checkContain([U,V],[X|L]):-union(U,V,W), \+ subset(X,W),
                               checkContain([U,V],L).

% add the candidate key in the schemas R
addCandidate(R,F,R2,R2):-checkCandidate(R,F,R2).
addCandidate(R,F,R2,R3):- \+ checkCandidate(R,F,R2),
                      candkey(R,F,X),append(R2,[X],R3).

% check the schemas R includes any candidate key or not
checkCandidate(R,F,[S|_]):-xplus(R,F,S,X),subset(X,R).
checkCandidate(R,F,[S|L]):-xplus(R,F,S,X), \+ subset(X,R),
                          checkCandidate(R,F,L).

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

%ljd(R,F,R1,R2) :- .
ljd(R,F,R1,R2):-
               union(R1,R2,RU),
               subset(RU,R),subset(R,RU),
               mergesort(R1,R11),
               mergesort(R2,R22),
               intersect(R11,R22,[],RC),
               xplus(R,F,RC,XPLUS),
               ljd1(XPLUS,R11,R22).

% find the intersect of A and B.
intersect([A|L1],[B|L2],L3,RC):-A@<B,intersect(L1,[B|L2],L3,RC).
intersect([A|L1],[B|L2],L3,RC):-A@>B,intersect([A|L1],L2,L3,RC).
intersect([A|L1],[A|L2],L3,RC):-intersect(L1,L2,[A|L3],RC).
intersect([],_,L,L).
intersect(_,[],L,L).

% lossless join
ljd1(XPLUS,R11,R22):-
               subset(XPLUS,R11);
               subset(XPLUS,R22).
%%**************************************************
%% Generalized LJD Test
%% matrix method
%%**************************************************
ljd(R,F,D) :-
  initialMatrix(R,D,M,1),
  makeFDsSingleRHS(F,G),
  enforceFDs(R,G,M,FinalMatrix),
  writeMatrix(FinalMatrix),nl, 
  foundARow(FinalMatrix).

initialMatrix(_,[],[],_).
initialMatrix(R,[S1|S],[Row|M1],RowNo) :-
  makeRow(R,S1,Row,RowNo,1),
  NextRowNo is RowNo+1,
  initialMatrix(R,S,M1,NextRowNo).

writeMatrix([]).
writeMatrix([Row|Rest]) :- write(Row), nl, writeMatrix(Rest).

makeRow([],_,[],_,_).
makeRow([A|R],S,[[a,ColNo]|Row1],RowNo,ColNo) :-
  member(A,S),
  NextColNo is ColNo + 1,
  makeRow(R,S,Row1,RowNo,NextColNo).
makeRow([A|R],S,[[b,RowNo,ColNo]|Row1],RowNo,ColNo) :-
  \+ member(A,S), 
  NextColNo is ColNo + 1,
  makeRow(R,S,Row1,RowNo,NextColNo).

makeFDsSingleRHS([],[]).
makeFDsSingleRHS([[X,Y]|Rest],H) :-
  generateSimpleFDs(X,Y,F),
  makeFDsSingleRHS(Rest,G),
  append(F,G,H).

generateSimpleFDs(_,[],[]).
generateSimpleFDs(X,[A|Rest],[[X,[A]]|F]) :-
  generateSimpleFDs(X,Rest,F).

enforceFDs(R,F,M,Mout) :- 
  enforceOneIteration(R,F,M,M1),
  M \== M1,
  enforceFDs(R,F,M1,Mout).

enforceFDs(R,F,M,Mout) :- 
  enforceOneIteration(R,F,M,Mout),
  M == Mout.

enforceOneIteration(_,[],M,M).
enforceOneIteration(R,[[X,Y]|Rest],M,Mout) :-
  enforceSingleFD(R,[X,Y],M,M1), 
  enforceOneIteration(R,Rest,M1,Mout).

enforceSingleFD(R,[X,Y],M,Mout) :-
  attributesAsIndices(R,X,Ix),
  attributesAsIndices(R,Y,[RHSCol]),
  projectOnX(Ix,M,M1),
  findDupPositions(M1,M1,Pos), list_to_set(Pos,DupRows),
  updateRHS(M,DupRows,RHSCol,Mout).

updateRHS(M,[],_,M).
updateRHS(M,[Rows|Rest],RHSCol,Mout) :-
  obtainRHSvalues(M,Rows,RHSCol,RHSvalues,1),
  sort(RHSvalues,[A|L]),
  length(L,N), N \== 0,
  changeRHS(M,Rows,RHSCol,A,M1,1), 
  updateRHS(M1,Rest,RHSCol,Mout).
updateRHS(M,[Rows|Rest],RHSCol,Mout) :-
  obtainRHSvalues(M,Rows,RHSCol,RHSvalues,1),
  sort(RHSvalues,[_|L]),
  length(L,N), N == 0,
  updateRHS(M,Rest,RHSCol,Mout).

obtainRHSvalues([],_,_,[],_).
obtainRHSvalues([Row|Rest],Rows,RHSCol,[V|RHSvals],RowNo) :-
  member(RowNo,Rows),
  nth1(RHSCol,Row,V),
  NextRowNo is RowNo + 1,
  obtainRHSvalues(Rest,Rows,RHSCol,RHSvals,NextRowNo).
obtainRHSvalues([_|Rest],Rows,RHSCol,RHSvals,RowNo) :-
  \+ member(RowNo,Rows),
  NextRowNo is RowNo + 1,
  obtainRHSvalues(Rest,Rows,RHSCol,RHSvals,NextRowNo).

changeRHS([],_,_,_,[],_).
changeRHS([Row|Rest],Rows,RHSCol,A,[NewRow|M],RowNo) :-
  member(RowNo,Rows),
  changeRow(Row,RHSCol,A,NewRow,1),
  NextRowNo is RowNo + 1,
  changeRHS(Rest,Rows,RHSCol,A,M,NextRowNo).
changeRHS([Row|Rest],Rows,RHSCol,A,[Row|M],RowNo) :-
  \+ member(RowNo,Rows),
  NextRowNo is RowNo + 1,
  changeRHS(Rest,Rows,RHSCol,A,M,NextRowNo).

changeRow([_|Rest],Col,A,[A|Rest],Col).
changeRow([V|Rest],RHSCol,A,[V|NewRest],Col) :-
  RHSCol \== Col,
  NextCol is Col + 1,
  changeRow(Rest,RHSCol,A,NewRest,NextCol).

attributesAsIndices(_,[],[]).
attributesAsIndices(R,[A|Rest],[I|Index]) :-
  nth1(I,R,A), attributesAsIndices(R,Rest,Index).

projectOnX(_,[],[]).
projectOnX(Ix,[Row|Rest],[NewRow|M]) :-
  projectSingleRowOnX(Ix,Row,NewRow),
  projectOnX(Ix,Rest,M).

projectSingleRowOnX([],_,[]).
projectSingleRowOnX([I|Rest],Row,[V|P]) :-
  nth1(I,Row,V),
  projectSingleRowOnX(Rest,Row,P).

%%findDupPositions(L,L,Pos), list_to_set(Pos,Positions).
%%findDupPositions([a,b,a,c,b,a],[a,b,a,c,b,a],X).
%% X = [ [1,3,6], [2,5] ]

findDupPositions([],_,[]).
%%findDupPositions([A|L],M,[[A,Pos]|Positions]) :-
findDupPositions([A|L],M,[Pos|Positions]) :-
  setof(I,nth1(I,M,A),Pos), 
  length(Pos,N), N \== 1,
  findDupPositions(L,M,Positions).
findDupPositions([A|L],M,Positions) :-
  setof(I,nth1(I,M,A),Pos), 
  length(Pos,N), N == 1,
  findDupPositions(L,M,Positions).
  
foundARow([Row|_]) :-
  arow(Row). 
foundARow([Row|Rest]) :-
  \+ arow(Row),
  foundARow(Rest). 

arow([]).
arow([[a,_]|Rest]) :-
  arow(Rest).

%%*********************************************************************
%% End of Generalized LJD Test
%%*********************************************************************

%%*********************************************************************
%% FD Preserving Test for decompositions - Ullman text implementation
%% Input: R: relation scheme, F: list of functional dependencies
%%        D: a decomposition of R
%% Output: Yes: if D is a FD-preserving decomposition; No, otherwise
%%*********************************************************************
fpd(R,F,D) :-
  fdpd(R,F,F,D).

fdpd(_,_,[],_).
fdpd(R,F,[[X,Y]|Rest],D) :-
write('Considering '),write(X),write('-->'),write(Y),nl,
  computeXplus(R,F,D,X,Xplus),
write('Xplus='),write(Xplus),nl,
  subset(Xplus,Y), 
  fdpd(R,F,Rest,D).

computeXplus(R,F,D,OldXplus,OldXplus) :-
  iterateRi(R,F,D,OldXplus,NewXplus),
  list_to_set(OldXplus,OldXplusSet),
  list_to_set(NewXplus,NewXplusSet),
  OldXplusSet == NewXplusSet.

computeXplus(R,F,D,OldXplus,FinalXplus) :-
  iterateRi(R,F,D,OldXplus,NewXplus),
  list_to_set(OldXplus,OldXplusSet),
  list_to_set(NewXplus,NewXplusSet),
  OldXplusSet \== NewXplusSet,
  computeXplus(R,F,D,NewXplusSet,FinalXplus). 
  
iterateRi(_,_,[],CurrentXplus,CurrentXplus).
iterateRi(R,F,[Ri|Rest],CurrentXplus,FinalXplus) :-
  intersection(CurrentXplus,Ri,U),
  xplus(R,F,U,Uplus),
  intersection(Uplus,Ri,V),
  union(CurrentXplus,V,NewXplus),
  iterateRi(R,F,Rest,NewXplus,FinalXplus).

%%*********************************************************************
%% End of FD Preserving Test for decompositions
%%*********************************************************************

%%*********************************************************************
%% BCNF Decomposition
%% Input: R: Relation scheme
%%*********************************************************************
bcnf(R,F,D) :-
  iterateBCNF(R,F,[R],D).

iterateBCNF(R,F,D,D) :-
  \+ chooseNonBCNF(R,F,D,_,[_,_]),
  write('Final Result is: '),nl,
  displayDecomps(D).

iterateBCNF(R,F,D,FinalD) :-
  chooseNonBCNF(R,F,D,Q,[X,Y]), % This finds non BCNF scheme along with offending FD [X,Y]
  write('Scheme to decompose = '),write(Q),
  write(' Offending FD: '), write(X),write('-->'),write(Y),nl,
  subtract(D,[Q],D1),
  subtract(Q,Y,R1),
  union(X,Y,R2),
  append([R1],D1,D2),
  append(D2,[R2],NewD),
  iterateBCNF(R,F,NewD,FinalD).

displayDecomps([]) :- nl.
displayDecomps([R|Rest]) :- 
  write(R), nl, displayDecomps(Rest).

%%chooseNonBCNF(R,F,D,Q,[X,Y]).

chooseNonBCNF(R,F,[[_,_]|Rest],Q,[Alpha,Q4]) :- 
  chooseNonBCNF(R,F,Rest,Q,[Alpha,Q4]).
  
chooseNonBCNF(R,F,[S|_],Q,[Alpha,Q4]) :-
  length(S,N), N > 2, list_to_set(S,Q), 
  subset(Q,Alpha1), subtract(Q,Alpha1,Alpha), length(Alpha,M), M < N,
  xplus(R,F,Alpha,AlphaP), list_to_set(AlphaP,AlphaPlus),
  \+ subset(AlphaPlus,Q),
  subtract(Q,Alpha,Q1), intersection(AlphaPlus,Q1,Q2), Q2 \== [],
  subtract(AlphaPlus,Alpha,Q3), intersection(Q3,Q,Q4). 

chooseNonBCNF(R,F,[S|Rest],Q,[Alpha,Q4]) :-
  length(S,N), N > 2, list_to_set(S,Q), 
  subset(Q,Alpha1), subtract(Q,Alpha1,Alpha), length(Alpha,M), M < N,
  xplus(R,F,Alpha,AlphaP), list_to_set(AlphaP,AlphaPlus),
  subset(AlphaPlus,Q),
  chooseNonBCNF(R,F,Rest,Q,[Alpha,Q4]).

chooseNonBCNF(R,F,[S|Rest],Q,[Alpha,Q4]) :-
  length(S,N), N > 2, list_to_set(S,Q), 
  subset(Q,Alpha1), subtract(Q,Alpha1,Alpha), length(Alpha,M), M < N,
  xplus(R,F,Alpha,AlphaP), list_to_set(AlphaP,AlphaPlus),
  subset(AlphaPlus,Q),
  subtract(Q,Alpha,Q1), intersection(AlphaPlus,Q1,Q2), Q2 == [],
  chooseNonBCNF(R,F,Rest,Q,[Alpha,Q4]).

%%*********************************************************************
%% End of BCNF Decomposition
%%*********************************************************************

%%*********************************************************************
%% Test BCNF
%%*********************************************************************
isBCNF(R,F) :- 
  mincover(R,F,FC), !,
  testBCNF(R,FC,FC).

testBCNF(_,_,[]).
testBCNF(R,F,[[X,_]|Rest]) :-
  xplus(R,F,X,Xplus),
  list_to_set(R,Rs),
  list_to_set(Xplus,Xs),
  Rs == Xs,
  testBCNF(R,F,Rest).

%%*********************************************************************
%% End of Test BCNF
%%*********************************************************************

%%*********************************************************************
%% Test 3NF
%%*********************************************************************
is3NF(R,F) :- 
  mincover(R,F,FC), !,
  test3NF(R,FC,FC).

test3NF(_,_,[]).
test3NF(R,F,[[X,_]|Rest]) :-
  xplus(R,F,X,Xplus),
  list_to_set(R,Rs),
  list_to_set(Xplus,Xs),
  Rs == Xs,
  test3NF(R,F,Rest).
test3NF(R,F,[[X,Y]|Rest]) :-
  xplus(R,F,X,Xplus),
  list_to_set(R,Rs),
  list_to_set(Xplus,Xs),
  Rs \== Xs,
  setof(K,candkey(R,F,K),AllKeys),
  flatten(AllKeys,PrimeAttrs),
  subtract(Y,X,Z),
  subset(PrimeAttrs,Z),
  test3NF(R,F,Rest).

%%*********************************************************************
%% End of Test 3NF
%%*********************************************************************


%
%***************************************************************************
% Utility relations
%***************************************************************************
%
subset(S,SS) :- var(SS), !, subset_gen(S,SS).
subset(S,SS) :- subset_test(SS,S).

subset_gen(L,L).
subset_gen(L,M) :- remove(L,M).

remove([_|L],L).
remove([_|L],M) :- remove(L,M).
remove([A|L],[A|M]) :- remove(L,M).

subset_test([],_).
subset_test([A|L],B) :- member(A,B), subset_test(L,B).

mergesort([],[]) :- !.
mergesort([X],[X]) :- !.
mergesort(X,Z) :- 
  split(X,L1,L2),
  mergesort(L1,M1),
  mergesort(L2,M2),
  merge(M1,M2,Z).

split([],[],[]) :- !.
split([X],[X],[]) :- !.
split([X,Y|Z],[X|L1],[Y|L2]) :- 
  split(Z,L1,L2).

%%***********************************************************************
%%***********************************************************************
