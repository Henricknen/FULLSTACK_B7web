SELECT COUNT(*) FROM produtos;		-- 'count' conta quantos itens tem na tabela produtos

SELECT COUNT(*) AS contegem FROM produtos WHERE preco > 100;	-- ultilizando 'alias' para trocar count por 'contagem' e ultilizando condição para saber quanto produtos tem

SELECT AVG(preco) AS media, COUNT(*) AS total FROM produtos;		-- função 'avg' sendo ultilizada para calcular a média dos preços dos produtos da tabela

SELECT
	AVG(preco) AS media,		-- média
	COUNT(*) AS total,		-- total
	SUM(estoque) AS soma	-- soma
FROM produtos;