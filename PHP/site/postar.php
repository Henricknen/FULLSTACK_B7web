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
    $id_user = $line['id_user'];
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
        @$id = $line['id_post'];     // variável $id reçebe o que estiver na posição 'id_post' da variável $line que se torna um array 
    }

    
    @$id = $id + 1;
    $pasta = "postagem/post$id";        // local e nome da pasta
    if(file_exists($pasta)) {       // 'file_exists' verifica se o arquivo existe
        echo "pasta já existe...";
    } else {
        mkdir($pasta, 0777);        // função 'mkdir' ultilizada para criar a pasta caso ela não exista
    }
    $dt = date('Y-m-d');
    $hr = date('H:i:s');
    $page = 1;      // se refere a postagem
    
    if($registro == true) {     // se registro for verdadeiro o usuário poderá cadastrar na tabela

        mysqli_query($link, "insert into tb_postagens(titulo, imagem, texto, dt, hr, page, id_user) VALUES
                     ('$titulo', '$foto', '$conteudo', '$dt', '$hr', '$page', '$id_user')");
        move_uploaded_file($_FILES['foto']['tmp_name'], "user/". $pasta. "/". $foto);
    
        header('location:form_postar.php');
    } else {
        echo "Não foi possível cadastrar esse conteúdo...";
        echo "<a href=form_postar.php>Voltar ao formulário</a>";
    }


} else {
    header('location:index.php');
}