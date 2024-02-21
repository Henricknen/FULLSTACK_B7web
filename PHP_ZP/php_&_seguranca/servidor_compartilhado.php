<?php
phpinfo();      // função exibe informações detalhadas sobre a configuração atual do 'php', procure pelo arquivo 'php.ini' e faça as modificações a seguir

/*

para minimizar possíveis danos se o servidor for invadido, siga alguns passos como:

1º escolha uma hospedagem confiável e conhecida

2º desabilitar algumas 'funções espeçificas' e 'classes' do php:

    abra o 'php.ini' do servidor para fazer as devidas alterações
    procure pela diretiva de configuração 'disable_functions' que permite desabilitar algumas funções como o exemplo abaixo:
        
        - disable_functions = exec, shell_exec, sytem

    procure peça diretiva de configuração 'disable_functions' e desabilite as classes de manipulação de 'diretorios' e 'arquivos' como:
        
        - disable_functions = Directory, DirectoryIterator

*/