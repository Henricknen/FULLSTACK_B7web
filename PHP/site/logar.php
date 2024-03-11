<?php 
include "connect.php";
$email = $_POST['email'];       // variável '$email' reçebe o que vem do campo email do formúlario
$senha = $_POST['senha'];

if($email != ""  && $senha != "") {     // verificando se variáveis estão preenchidas
    // echo "Usuario logado";
    $sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$email'");     // trazendo todos os campos da tabela 'tb_user' onde o campo 'email' é igual ao '$email' forneçido pelo usúario
    $registro = mysqli_num_rows($sql);      // função 'mysqli_num_rows' verifica quantas linhas foi encontrada
    while($line = mysqli_fetch_array($sql)) {        // variável '$line' armazena registros que a função 'mysqli_fetch_array' localizar dentro da tabela 'tb_user'
        $senha_user = $line['senha'];
        $nivel = $line['nivel'];
    }
    if($registro) {     // o 'if' já verifica se a condição já é 'true'
        if($senha_user == $senha) {
            SESSION_START();        // iniçiando uma sessao
            $_SESSION['login'] = $email;      // guardando o email da pessoa na sessão 'login' da variável de ambiente '$_SESSION' 
            $_SESSION['password'] = $senha;
            if($nivel == 1) {
                header('location:adm.php');
            } else {
                header('location:cliente.php');     // se o '$nivel' for diferente de 1 será apenas um cliente
            }
        } else {
            echo "Senha não confere com a cadastra...";
            echo "<a href = 'login.php'>[Voltar]</a>";

        }
    } else {
        echo "Voçê não possui cadastro, Deseja-se cadastrar ?";
        echo "<a href = 'form_cadastro.php'>[Cadastre-se]</a>";
    }
} else {
    header('location:login.php?valor=1');
}