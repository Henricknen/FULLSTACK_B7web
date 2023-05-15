<?php
rename('teste.txt', 'teste2.txt');       // função 'rename' é usada para renomear o arquivo e reçebe dois parâmetros 1º é o caminho e o 2º que é o novo nome do arquivo

rename('teste2.txt', 'pasta/teste2.txt');       // movendo arquivo 'teste.txt' que foi renomeado para 'teste2' para dentro da 'pasta' ultilizando função 'rename'

copy('pasta/teste2.txt', 'teste1.txt');      // função 'copy' gera uma copia é obrigatorio dois parâmetros o 1º é a origem do arquivo a ser copiado, o 2º é o novo nome e destino da cópia