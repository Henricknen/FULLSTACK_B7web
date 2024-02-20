<?php
phpinfo();      // função exibe informações detalhadas sobre a configuração atual do 'php', procure pelo arquivo 'php.ini' e faça as modificações a seguir

/*

dentro do arquivo 'php.ini' procure pela diretiva de configuração 'error_reporting':
procure pela diretiva que estiver sem o ; no iniçio isso indica que está descomentada
em error_reporting voçe pode inserir a seguites constantes pré-definidas:

'E_ALL' que mostra todos os erros, avisos e notificações, incluindo os padrões de codificação:
        
    - error_reporting=E_ALL

'E_ALL & ~E_NOTICE' que mostra todos os erros, exceto avisos:
    
    - error_reporting=E_ALL & ~E_NOTICE

'E_ALL & ~E_NOTICE & ~E_STRICT' que mostra todos os erros, exceto avisos e avisos de padrões de codificação:
    
    - error_reporting=E_ALL & ~E_NOTICE & ~E_STRICT

mas oque realmente diz que os erros irão apareçer é a diretiva 'display_errors':
se estiver 'On' significa que os erros apareçerão na tela
ja em 'Off' os erros não apareçerão

    - display_errors=On

já 'log_errors' indica que os erros serão registrados em algum lugar:
    
    - log_errors=On

'error_log' espeçifica o arquivo que será salvo os erros:
    
    - error_log="C:\xampp\php\logs\php_error_log"

*/