<?php
require 'config.php';
require 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');

if($name && $email && $password && $birthdate) {        // verificando estes quatros campos

    $auth = new Auth($pdo, $base);

    $birthdate = explode('/', $birthdate);      // 'explode' faz a divivão da string '$birthdate'
    if(count($birthdate) != 3) {        // verificando se '$birthdate' possui exatamente 3 elementos
        $_SESSION['flash'] = 'Data de nacimento inválida.';
        header("Location: ". $base. "/signup.php");
        exit;        
    }
                // ano                  mês                   dia
    $birthdate = $birthdate[2]. '-'. $birthdate[1]. '-'. $birthdate[0];     // formatação da data em formato internaçional
    if(strtotime($birthdate) === false) {       // verificando se a data é real 'strtotime' transfere a data de string para uma data real
        $_SESSION['flash'] = 'Data de nacimento inválida.';
        header("Location: ". $base. "/signup.php");
        exit;
    }

    if($auth-> emailExists($email) === false) {       // ultilizando função que faz a verificação se 'email' existe
        $auth-> registerUser($name, $email, $password, $birthdate);      // 'registerUser' é uma função que registra o usuário
        header("Location: ". $base);        // depois de cadastrado o usuário é enviado para página inçial
        exit;
    } else {        // se existir 'email' no banco de dados
        $_SESSION['flash'] = 'E-mail já cadastrado.';
        header("Location: ". $base. "/signup.php");
        exit;
    }
    
}

$_SESSION['flash'] = 'Campos não enviados.';
header("Location: ". $base. "/signup.php");
exit;