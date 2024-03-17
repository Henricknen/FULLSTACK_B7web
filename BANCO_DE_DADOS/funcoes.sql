DELIMITER $$
CREATE FUNCTION CONTAR(nome VARCHAR(100))		-- criação da função 'CONTAR' reçebendo nome de 100 caracteres como parâmetro
	RETURNS INT(10)		-- retorno da função
    BEGIN		-- significa iniçiar a função
    
		DECLARE qt INT(10);		-- declarando a variável 'qt'
        SET qt = LENGTH(nome);		-- preenchendo a variável 'qt' com a quantidade de caracteres do nome
        RETURN qt;
     
     END$$		-- encerra a função
     
DELIMITER ;

SELECT nome, data_cadastro, CONTAR(nome) as contagem FROM usuarios;		-- usando a função 'CONTAR' e passando 'nome' como parâmetro

DELIMITER $$

CREATE FUNCTION SOMAR(x INT(10), y INT(10))
	RETURNS INT(10)
    BEGIN
    
		DECLARE r INT(10);
        SET r = x + y;
        RETURN r;
        
	END$$
    
DELIMITER $$
    
    SELECT SOMAR(5, 4) as soma;