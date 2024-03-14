UPDATE usuarios SET nome = 'Programador FullStack';		-- não é recomendado dar um 'update' sem o 'where' pois altera todos os registros da tabela

UPDATE usuarios SET nome = 'Luis Henrique S. F.' WHERE id = 10;		-- atualizando nome da tabela usuarios enquanto id for igual a 10

UPDATE produtos  SET preco = preco * 1.1 WHERE id_fornecedor = 6;		-- atualizanso, adiçionando 10% no produto de 'id_fornecedor = 6'

