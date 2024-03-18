CREATE VIEW precoacessivel AS		-- criando uma 'view' chamada 'precoacessivel'
	SELECT * FROM produtos WHERE preco = '500';		-- fazendo consulta na tabela virtual 'view'
    
SELECT * FROM precoacessivel;		-- consultando a view 'precoacessivel' para obter os produtos com preço acessível