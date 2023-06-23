<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth-> checkToken();

$userDao = new UserDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');      // reçebendo todos os campos que será alterados
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$birthdate = filter_input(INPUT_POST, 'birthdate');
$city = filter_input(INPUT_POST, 'city');
$work = filter_input(INPUT_POST, 'work');
$password = filter_input(INPUT_POST, 'password');
$password_confirmation = filter_input(INPUT_POST, 'password_confirmation');
 
if($name && $email) {       // verificando se usuário tem nome e email válido
    $userInfo-> name = $name;       // trocando '$userInfo' name pelo '$name' que usuário digitar
    $userInfo-> city = $city;
    $userInfo-> work = $work;

    // e-mail
    if($userInfo-> email != $email) {       // verificando se 'email' digitado é diferente do atual
        if($userDao-> findByEmail($email) === false) {      // se 'email' digitado não exite no banco de dados
            $userInfo-> email = $email;
        } else {
            $_SESSION['flash'] = 'E-mail já existe!';
            header("Location: ". $base. "configuracoes.php");
            exit;
        }
    }

    // birthdate
    $birthdate = explode('/', $birthdate);      // 'explode' faz a divivão da string '$birthdate'
    if(count($birthdate) != 3) {        // verificando se '$birthdate' possui exatamente 3 elementos
        $_SESSION['flash'] = 'Data de nacimento inválida.';
        header("Location: ". $base. "/configuracoes.php");
        exit;        
    }                // ano                  mês                   dia
    $birthdate = $birthdate[2]. '-'. $birthdate[1]. '-'. $birthdate[0];     // formatação da data em formato internaçional
    if(strtotime($birthdate) === false) {       // verificando se a data é real 'strtotime' transfere a data de string para uma data real
        $_SESSION['flash'] = 'Data de nacimento inválida.';
        header("Location: ". $base. "/configuracoes.php");
        exit;
    }
    $userInfo-> birthdate = $birthdate;     // adiçionando o 'birthdate' atualizado

    // password
    if(!empty($password)) {     // se 'password' estiver preechido
        if($password === $password_confirmation) {
            $hash = password_hash($password, PASSWORD_DEFAULT);     // gerando um 'hash' do 'password'
            $userInfo-> password = $hash;
        } else {
            $_SESSION['flash'] = "As senhas não batem.";
            header("Location: ". $base. "/configuracoes.php");
            exit;
        }
    }

    $userDao-> update($userInfo);
}

header("Location: ". $base. "/configuracoes.php");
exit;