funcionario([idfuncionario, idpessoa, salario, data_pagamento]).
fds([ [[idfuncionario], [idpessoa, salario, data_pagamento]], [[idpessoa], [idfuncionario, salario, data_pagamento ]] ]).

% funcionario(R), fds(F), candkey(R, F, CANDKEY).

% funcionario(R), fds(F), threenf(R, F, R3NF).