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
    
    echo $foto. "<br>";     // arquivo antes da substituição
    include "substituicao.php";     // para alterar o nome do arquivo
    echo $foto. "<br>";     // depois da substituição
    
    $registro = false;
    if($titulo != "" && $foto != "" && $conteudo != "") {       // se variáveis forem diferentes de vazio
        $registro = true;       // variável '$registro' equivale a 'true' habilitando fazer cadastro na tabela de registro
    } else {
        echo "<script>window.history.go(-1);</script>";
    }

} else {
    header('location:index.php');
}

?>