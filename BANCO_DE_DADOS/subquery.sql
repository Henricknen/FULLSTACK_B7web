SELECT		-- executa query para pegar os produtos
	*,		-- seleçionando todos '*' os campos da tabela 'produtos' e se ultiliza a ',' para separar os campos seleçionados da 'subconsulta'
    (SELECT fornecedores.nome FROM fornecedores WHERE fornecedores.id = produtos.id_fornecedor) AS nome_fornecedor		-- subconsulta entre parêntes garante que será tratada como expressão única e o resultado desta query se chamará 'nome_fornecedor'
FROM produtos;