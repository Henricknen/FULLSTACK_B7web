create table tb_postagens(
id_post int(5) primary key auto_increment,		-- coluna para identificação única de cada postagem
titulo varchar(60) not null,		-- 'not null' não pode ser nulo
imagem varchar(60) not null,
texto varchar(40) not null,
url varchar(60) not null,
dt date not null,
hr time not null,
page int(1) not null,
id_user int(5) not null,		-- 'id' do usuário que fez a postagem
FOREIGN KEY(id_user) REFERENCES tb_user(id_user)		-- chave estrangeira referenciando a tabela de usuários (tb_user)
);