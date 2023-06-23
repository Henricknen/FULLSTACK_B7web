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

    if($userInfo-> email != $email) {       // verificando se 'email' digitado é diferente do atual
        if($userDao-> findByEmail($email) === false) {      // se 'email' digitado não exite no banco de dados
            $userInfo-> email = $email;
        } else {
            $_SESSION['flash'] = 'E-mail já existe!';
            header("Location: ". $base. "configuracoes.php");
            exit;
        }
    }
    // $userDao-> update($userInfo);
}

header("Location: ". $base. "/configuracoes.php");
exit;