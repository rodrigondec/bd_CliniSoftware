produto([idmercancia, idproduto, nome, preco]).
fds([ [[idmercancia], [idproduto]], [[idproduto], [nome, preco, idmercancia]]]).

% produto(R), fds(F), candkey(R, F, CANDKEY).

% produto(R), fds(F), threenf(R, F, R3NF).