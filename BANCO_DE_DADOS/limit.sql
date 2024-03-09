SELECT * FROM produtos LIMIT 4;		-- ultilizando 'LIMIT' para apresentar apenas os 4 primeiros produtos

SELECT * FROM  produtos ORDER BY preco DESC LIMIT 4;		-- ordenando e pegando os 4 mais caros

SELECT * FROM produtos LIMIT 0,3;		-- o limite é iniçiado do primeiro '0' da lista e é pegado três '3' produtos
SELECT * FROM produtos LIMIT 1,3;			-- o numero 1 indica que o primeiro registro a ser retornado é o segundo elemento

SELECT * FROM produtos WHERE id_fornecedor = 6 ORDER BY estoque DESC LIMIT 0,2;