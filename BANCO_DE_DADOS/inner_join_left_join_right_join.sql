SELECT 
	produtos.id, produtos.nome, produtos.preco, produtos.estoque, fornecedores.nome AS fornecedor
FROM produtos
INNER JOIN fornecedores ON fornecedores.id = produtos.id_fornecedor;		-- 'inner join' só pegará o produto quando a tabela da esquerda 'produtos' bate com a tabela da direita 'fornecedores'

SELECT 
	produtos.id, produtos.nome, produtos.preco, produtos.estoque, fornecedores.nome AS fornecedor
FROM produtos
RIGHT JOIN fornecedores ON fornecedores.id = produtos.id_fornecedor;		-- 'right join' retornará todos os resultados da tabela da direita 'fornecedores' independente se ele bater ou não com algum registro da tabela da esquerda 'produtos'

SELECT 
	produtos.id, produtos.nome, produtos.preco, produtos.estoque, fornecedores.nome AS fornecedor
FROM produtos
LEFT JOIN fornecedores ON fornecedores.id = produtos.id_fornecedor;		-- 'left join' retornará todos os resultados da tabela da esquerda 'produtos' independente da tabela da direita 'fornecedores' bater algum registro
