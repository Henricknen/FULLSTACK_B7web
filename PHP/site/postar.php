<?php 

include "connect.php";
$dt = date_default_timezone_set('America/Sao_Paulo');

SESSION_START();        // iniçia ou recupera uma sessão que está em aberto
$login = $_SESSION['login'];        // email do usuário
$senha_log = $_SESSION['password'];     // senha do usuário
$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)) {       // 'mysqli_fetch_array' faz uma varredura na tabela
    $senha = $line['senha'];
    $nivel = $line['nivel'];
    $id = $line['id_user'];
}

if($senha_log == $senha && $nivel == 1) {        // testando senha de quem está logado com senha da tabela e se o nivel é igual a 1
    $titulo = $_POST['titulo'];     
    $foto = $_FILES['foto']['name'];        // variável '$foto' reçebendo o nome do arquivo
    $tipo = $_FILES['foto']['type'];
    $conteudo = $_POST['conteudo'];
    
    include "substituicao.php";     // para alterar o nome do arquivo
    
    $registro = false;
    if($titulo != "" && $foto != "" && $conteudo != "") {       // se variáveis forem diferentes de vazio
        $registro = true;       // variável '$registro' equivale a 'true' habilitando fazer cadastro na tabela de registro
    } else {
        echo "<script>window.history.go(-1);</script>";
    }

    $sql = mysqli_query($link, "SELECT * FROM tb_postagens ORDER BY id_post DESC LIMIT 1");     // consulta pega o 'id' da tabela postagem em ordem decreceste
    while($line = mysqli_fetch_array($sql)) {       // variável '$line' reçebe o que vem da consulta
        $id = $line['id_post'];     // variável $id reçebe o que estiver na posição 'id_post' da variável $line que se torna um array 
    }

    $pasta = "postagem/post$id";        // local e nome da pasta
    echo $pasta;
    mkdir($pasta, 0777, true);        // função 'mkdir' ultilizada para criar pasta
    echo "pasta criada";

} else {
    header('location:index.php');
}