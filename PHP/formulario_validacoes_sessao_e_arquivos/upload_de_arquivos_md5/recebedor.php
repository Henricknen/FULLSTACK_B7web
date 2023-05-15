<?php
echo '<pre>';       // '<pre>' pula linha
print_r($_FILES);       // '$_FILES' variável global

$permitidos = ['image/jpeg', 'image/jpg', 'image/png'];     // extensões lista de arrays permitidas
if(in_array($_FILES['arquivo']['type'], $permitidos)) {       // função 'in_array' procura pelo 'type' do arquivo
    $nome = md5(time(). rand(0, 1000)). '.png';     // gerando 'hash' ultilizando função 'md5'
    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/'. $nome);       // função 'move_uploaded_file' move o arquivo da área temporaria para dentro do sistema
                   // (local temporario do arquivo   , local onde o arquivo será guardado);

    echo 'Arquivo salvo com sucesso...';
} else {
    echo 'Arquivo não permitido...';
}