SELECT 
	produtos.id, produtos.nome, produtos.preco, produtos.estoque, fornecedores.nome AS fornecedor		-- itens que serão seleçionados
FROM produtos
INNER JOIN fornecedores ON fornecedores.id = produtos.id_fornecedor;		-- 'inner join' está unindo as tabelas 'produtos' e 'fornecedores' com base na correspondência dos valores na coluna 'id_fornecedor'