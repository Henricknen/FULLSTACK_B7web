   -- soma do estoque     			nome das colunas			agrupando pelo id_fornecedores
SELECT SUM(estoque) AS estoqueTotal, id_fornecedor FROM produtos GROUP BY id_fornecedor;		-- 'group by' agrupa o estoqueTotal pelo 'id_fornecedor'