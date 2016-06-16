medico([idmedico, preco_padrao, idfuncionario, cadastro_unico, ativo]).
fds([ [[idmedico], [idfuncionario, preco_padrao, cadastro_unico, ativo]], [[idfuncionario], [idmedico]] ]).

% medico(R), fds(F), candkey(R, F, CANDKEY).

% medico(R), fds(F), threenf(R, F, R3NF).