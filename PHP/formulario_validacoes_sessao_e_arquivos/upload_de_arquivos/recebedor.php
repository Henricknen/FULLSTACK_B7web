<?php
echo '<pre>';       // '<pre>' pula linha
print_r($_FILES);       // '$_FILES' variável global

$nome = $_FILES['arquivo']['name'];     // nome que será o mesmo nome do arquivo enviado
                 // local temporario do arquivo  // local onde o arquivo será guardado
move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/'. $nome);       // função 'move_uploaded_file' move o arquivo da área temporaria para dentro do sistema