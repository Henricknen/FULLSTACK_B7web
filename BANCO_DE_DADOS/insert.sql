INSERT INTO usuarios (nome, data_cadastro) VALUES		-- instrução SQL para inserir dados na tabela "usuarios"
	('João', '2023-01-01'),		-- 'id' por ser chave primaria e autoincrementada não é necessario espeçificar valores a ela durante a inserção de dados, isso ocorrerá automaticamente
	('Maria', '2023-02-15'),
	('Pedro', '2023-03-20'),
	('Ana', '2023-04-10'),
	('Lucas', '2023-05-25');

INSERT INTO produtos (nome, preco, estoque, minestoque, fornecedor) VALUES		-- 'INSERT INTO' indica que será inserido dados na tabela 'produtos'
	('Teclado', 50.00, 100, 20, 'NASA'),
	('Monitor', 400.00, 150, 30, 'Microsoft'),
	('Mouse', 30.00, 200, 40, 'Amazon'),
	('Notebook', 2500.00, 250, 50, 'Samsung'),
	('Impressora', 300.00, 300, 60, 'HP'),
	('Smartphone', 1500.00, 350, 70, 'Apple'),
	('Tablet', 800.00, 400, 80, 'Lenovo'),
	('Fone de ouvido', 100.00, 450, 90, 'Sony'),
	('Câmera digital', 600.00, 500, 100, 'Canon'),
	('Roteador', 120.00, 550, 110, 'TP-Link');


INSERT INTO fornecedores (nome, telefone) VALUES		-- 'VALUES' indica os valores que serão inseridos
	('NASA', '(11) 1234-8962'),
	('Microsoft', '(22) 9693-6789'),
	('Amazon', '(33) 3456-1256'),
	('Samsung', '(44) 4586-8901'),
	('HP', '(55) 5678-7892'),
	('Apple', '(66) 6545-8659');