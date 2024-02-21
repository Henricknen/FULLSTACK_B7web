<?php                               // usúario/ senha/                          banco de dados
exec("C:\xampp\mysql\bin\mysqldump.exe -u root -proot --result-file=bd_backup.sql eventos");     // ultilizando recurso 'mysql dump' para fazer o backup que se encotra no caminho e caminho espeçificado 
// função 'exec'ela executa comandos no terminal