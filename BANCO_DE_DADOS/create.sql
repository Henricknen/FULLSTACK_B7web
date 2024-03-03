CREATE DATABASE IF NOT EXISTS crm; 		-- cria o banco de dados "crm"

USE crm; 		-- seleciona o banco de dados "crm" para as operações subsequentes

CREATE TABLE IF NOT EXISTS usuarios ( 		-- cria a tabela "usuarios"
    id INT(11) AUTO_INCREMENT PRIMARY KEY, 		-- 'PRIMARY KEY'  define a coluna "id" como a chave primária da tabela
    nome VARCHAR(100) NOT NULL, 		-- nome do usuário, não pode ser nulo
    data_cadastro DATE NOT NULL 		-- data de cadastro do usuário, não pode ser nula
);

CREATE TABLE IF NOT EXISTS produtos (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    preco FLOAT(12) NOT NULL,
    estoque INT(11) NOT NULL DEFAULT 0,		-- cláusula 'DEFAULT 0' garante se nenhum valor for forneçido o 'valor padrão' será 0
    minestoque INT(11) NOT NULL DEFAULT 0,
    id_fornecedor INT(11)		-- estabeleçe um relaçionamento com a tabela que contém o id do forneçedor cadastrado
);

CREATE TABLE IF NOT EXISTS fornecedores (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(50)
);