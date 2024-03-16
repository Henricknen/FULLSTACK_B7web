SELECT * FROM produtos HAVING id = 6;		-- 'having' filtra os produtos cujo id é igual a 6

SELECT (id + 10) as novoId FROM produtos;		-- 'as', também conhecido como 'alias', renomeia a coluna resultante da expressão '(id + 10)' como 'novoId'

SELECT *, (id + 10) as soma FROM usuarios;		-- 'as' cria uma coluna temporária chamada soma

SELECT *, (id + 10) as soma FROM usuarios HAVING soma < 15;		-- 'having' permite a filtragem da coluna criada temporariamente