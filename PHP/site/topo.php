<img src = "img/logo.png" class = "logo">

<?php
include "connect.php";
SESSION_START();
@$email = $_SESSION['login'];       // o '@' antes da variável ignora os erros de variáveis vazias
@$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$email'");
while($line = mysqli_fetch_array($sql)) {
    $nivel = $line['nivel'];
}

if(@$nivel == 1) {       // se pessoa estiver logada verá os links abaixo
    echo "<a href = 'logout.php' class = 'links_top'>Sair</a>";
    echo "<a href = 'adm.php' class = 'links_top'>Ir para Adm</a>";
    
} else if(@$nivel == "") {        // se não estiver logado aparecerá esses links
    echo "<a href = 'login.php' class = 'links_top'>Logar</a>";
    echo "<a href = 'form_cadastro.php' class = 'links_top'>Cadatra-se</a>";
} else {        // se o usuário logado não tiver o '$nivel' igual a 1 ou vazio será o cliente e apareçerá os seguintes links
    echo "<a href = 'logout.php' class = 'links_top'>Sair</a>";
    echo "<a href = 'cliente.php' class = 'links_top'>Ir para Cliente</a>";    
}
?>