pessoa([idpessoa, telefone, cpf, data_nascimento, email, pnome, mnome, unome]).
fds([ [[idpessoa], [telefone, cpf, data_nascimento, email, pnome, mnome, unome]], [[cpf], [idpessoa]],
		[[email], [idpessoa]]
	]).

% pessoa(R), fds(F), candkey(R, F, CANDKEY).

% pessoa(R), fds(F), threenf(R, F, R3NF).