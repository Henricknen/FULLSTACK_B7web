<?php 

include "connect.php";
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
    echo "Postagens";
} else {
    header('location:index.php');
}

?>