<?php

try {    // definindo os parâmetros de conexão com 'banco de dados'
    $dsn = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpass = "";
    
    $pdo = new PDO($dsn, $dbuser, $dbpass);     // criando uma instância do objeto 'PDO' para conexão

} catch (PDOException $e) {     // em caso de erro na conexão, encerra o script e exibe a mensagem de erro
    die($e->getMessage());
}

$qt_por_paginas = 5;        // definindo o limite da páginação

$total = 0;
$sql = "SELECT COUNT(*) as c FROM posts";       // calculando a quantidade de páginas
$sql = $pdo-> query($sql);
$sql = $sql-> fetch();
$total = $sql['c'];
$paginas = $total / $qt_por_paginas;

$pg = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {       // definindo o '$p'
    $pg = addslashes($_GET['p']);
}

$p = ($pg - 1) * $qt_por_paginas;

$sql = "SELECT * FROM posts LIMIT $p, $qt_por_paginas";       // consulta SQL para selecionar todos os registros da tabela "posts" query com limite 'LIMIT'

$sql = $pdo->query($sql);       // executando a consulta no banco de dados usando o objeto PDO

if ($sql->rowCount() > 0) {         // verificando se há registros retornados pela consulta

    foreach ($sql->fetchAll() as $item) {       // iterando sobre os resultados da consulta usando fetchAll
        echo $item['id'] . ' - ' . $item['titulo'] . "<br>";        // exibindo informações do post 'id' e 'título'
    }
}

echo "<hr/>";
for($q = 0; $q < $paginas; $q++) {
    echo '<a href="./?p='. ($q + 1). '">['. ($q + 1). ']</a>';      // links das 'páginas'
}

?>
