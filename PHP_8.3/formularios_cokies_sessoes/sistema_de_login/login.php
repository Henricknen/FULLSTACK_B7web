<?php
session_start();

if(!empty($_POST['usuario']) && !empty($_POST['password'])) {       // se os dados foram recebidos do formulário
    $usuario = htmlspecialchars($_POST['usuario']);     // dados será definidos
    $senha = htmlspecialchars($_POST['password']);

    if($usuario == "admin" && $senha == "admin") {      // se os dados estiverem corretos
        $_SESSION['usuario'] = $usuario;        // será gravada uma seção 'session' para o usuário
        if(!empty($_POST['tema'])) {
            setcookie('tema', htmlspecialchars($_POST['tema']));        // se tema 'não estiver vazio' receberá um 'setcokie' de tema
        }
        header("Location: welcome.php");        // redireçiona o usuário para página 'welcome.php'
    } else {
        echo "Usuário ou senha inválidos...";
        echo "<a href='index.php'>Tentar novamente...</a>";
    }
} else {
    echo "Preencha todos os dados...";
    echo "<a href='index.php'>Voltar</a>";
}
