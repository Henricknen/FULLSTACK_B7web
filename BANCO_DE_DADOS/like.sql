SELECT * FROM usuarios WHERE nome LIKE '%ca%';		-- 'LIKE' retornará todas as linhas onde a coluna contenha a palvra 'ca' não importando a posição que esteja e '%' indica um texto altenativo ou o 'restante' da string tanto do iniçio ou no final

-- TEXTO% - iniçia com TEXTO e termina com o restante da string
-- %TEXTO - iniçia com um iniçio da string e termina com 'TEXTO'
-- %TEXTO% - 'TEXTO' ficará no meio da frase