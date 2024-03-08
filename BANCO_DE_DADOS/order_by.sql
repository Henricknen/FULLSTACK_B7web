SELECT * FROM produtos ORDER BY estoque DESC;		-- seleçiona todas as colunas tabela produto e 'order by' ordena os resultados em ordem decrescente com base na coluna 'estoque'

SELECT * FROM produtos ORDER BY nome ASC;		-- 'order by' ordena os resultados em ordem crescente

SELECT * FROM produtos WHERE id_fornecedor = 5 ORDER BY nome DESC;		-- codição 'where' tem sempre que ficar antes da ordem 'order by'

SELECT * FROM produtos ORDER BY minestoque ASC, nome ASC;