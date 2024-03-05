SELECT * FROM produtos WHERE preco > 150;		-- uso do operador > pega os valores maior que 150

SELECT * FROM produtos WHERE preco <= 120;		-- uso do operador <= pega os valores menores ou iguais a 120

SELECT * FROM produtos WHERE estoque > minestoque;		-- fazendo comparação de dois campos diferentes

SELECT * FROM produtos WHERE preco > 100 AND preco <= 300;		-- ultilizando operador lógico 'AND' que significa 'E' , onde o produto só é inserido na lista se as duas codições forem verdadeiras

SELECT * FROM produtos WHERE preco = 1500 OR preco = 2500;		-- operador lógico 'OR' signifiza 'OU' seleçiona os produtos que atederem pelo menos uma das condições espeçificadas

