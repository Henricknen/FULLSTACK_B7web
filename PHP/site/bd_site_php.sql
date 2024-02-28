-- create database bd_site_php;		-- comando para criar o banco de dados 'bd_site_php'

use bd_site_php;		-- define o banco de dados onde a tabela será criada

create table tb_user(		-- criação da tabela 'tb_user'
id_user int(5) primary key auto_increment,		-- coluna para identificação única de cada usuário
nome varchar(60) not null,		-- coluna 'not null' não pode ser nula
email varchar(60) not null,
senha varchar(20) not null,
lembrete varchar(60) not null,
foto varchar(60) null,
nivel int(1) not null,
dt date,		-- data de cadastro
hr time			-- hora do cadastro
);