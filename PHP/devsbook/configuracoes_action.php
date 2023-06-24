<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$userDao = new UserDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');      // recebendo todos os campos que serão alterados
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$birthdate = filter_input(INPUT_POST, 'birthdate');
$city = filter_input(INPUT_POST, 'city');
$work = filter_input(INPUT_POST, 'work');
$password = filter_input(INPUT_POST, 'password');
$password_confirmation = filter_input(INPUT_POST, 'password_confirmation');
 
if ($name && $email) {       // verificando se usuário tem nome e email válidos
    $userInfo->name = $name;       // trocando o 'name' de '$userInfo' pelo valor que o usuário digitou
    $userInfo->city = $city;
    $userInfo->work = $work;

    // e-mail
    if ($userInfo->email != $email) {       // verificando se o 'email' digitado é diferente do atual
        if ($userDao->findByEmail($email) === false) {      // se o 'email' digitado não existe no banco de dados
            $userInfo->email = $email;
        } else {
            $_SESSION['flash'] = 'E-mail já existe!';
            header("Location: " . $base . "configuracoes.php");
            exit;
        }
    }

    // birthdate
    $birthdate = explode('/', $birthdate);      // 'explode' divide a string '$birthdate'
    if (count($birthdate) != 3) {        // verificando se o '$birthdate' possui exatamente 3 elementos
        $_SESSION['flash'] = 'Data de nascimento inválida.';
        header("Location: " . $base . "/configuracoes.php");
        exit;        
    }
    // ano        mês                   dia
    $birthdate = $birthdate[2] . '-' . $birthdate[1] . '-' . $birthdate[0];     // formatação da data em formato internacional
    if (strtotime($birthdate) === false) {       // verificando se a data é válida usando 'strtotime' para converter a string em uma data real
        $_SESSION['flash'] = 'Data de nascimento inválida.';
        header("Location: " . $base . "/configuracoes.php");
        exit;
    }
    $userInfo->birthdate = $birthdate;     // adicionando o 'birthdate' atualizado

    // password
    if (!empty($password)) {     // se 'password' estiver preenchido
        if ($password === $password_confirmation) {
            $hash = password_hash($password, PASSWORD_DEFAULT);     // gerando um 'hash' da senha
            $userInfo->password = $hash;
        } else {
            $_SESSION['flash'] = "As senhas não batem.";
            header("Location: " . $base . "/configuracoes.php");
            exit;
        }
    }

    // avatar
    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {      // verificando se o avatar existe e está preenchido
        $newAvatar = $_FILES['avatar'];

        if (in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
            $avatarWidth = 225;
            $avatarHeight = 150;

            list($widthOrig, $heightOrig) = getimagesize($newAvatar["tmp_name"]);
            $ratio = $widthOrig / $heightOrig;

            $newWidth = $avatarWidth;       // nova largura da imagem
            $newHeight = $newWidth / $ratio;        // cálculo da nova altura da imagem

            if ($newHeight < $avatarHeight) {    // verificando se a imagem não ficou menor do que o tamanho desejado 
                $newHeight = $avatarHeight;
                $newWidth = $newHeight * $ratio;
            }

            $x = $avatarWidth - $newWidth;        // cálculo da nova altura e largura
            $y = $avatarHeight - $newHeight;
            $x = $x < 0 ? $x / 2 : $x;      // cálculo do espaço de corte
            $y = $y < 0 ? $y / 2 : $y;

            $finalImage = imagecreatetruecolor($avatarWidth, $avatarHeight);        // gerando a imagem
            switch ($newAvatar['type']) {
                case 'image/jpeg':
                case 'image/jpg':
                    $image = imagecreatefromjpeg($newAvatar['tmp_name']);
                    break;

                case 'image/png':
                    $image = imagecreatefrompng($newAvatar['tmp_name']);
                    break;
            }

            imagecopyresampled(        // copiando uma imagem dentro da outra fazendo os devidos cortes
                $finalImage, $image,
                $x, $y, 0, 0,
                $newWidth, $newHeight, $widthOrig, $heightOrig
            );

            $avatarName = md5(time() . rand(0, 9999)) . '.jpg';

            imagejpeg($finalImage, './media/avatars/' . $avatarName, 100);       // salvando a imagem

            $userInfo->avatar = $avatarName;          // inserindo a imagem em '$userInfo'

        }
    }

    // cover
    if (isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name'])) {      // verificando se o cover existe e está preenchido
        $newCover = $_FILES['cover'];

        if (in_array($newCover['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
            $coverWidth = 850;
            $coverHeight = 310;

            list($widthOrig, $heightOrig) = getimagesize($newCover["tmp_name"]);
            $ratio = $widthOrig / $heightOrig;

            $newWidth = $coverWidth;       // nova largura da imagem
            $newHeight = $newWidth / $ratio;        // cálculo da nova altura da imagem

            if ($newHeight < $coverHeight) {    // verificando se a imagem não ficou menor do que o tamanho desejado 
                $newHeight = $coverHeight;
                $newWidth = $newHeight * $ratio;
            }

            $x = $coverWidth - $newWidth;        // cálculo da nova altura e largura
            $y = $coverHeight - $newHeight;
            $x = $x < 0 ? $x / 2 : $x;      // cálculo do espaço de corte
            $y = $y < 0 ? $y / 2 : $y;

            $finalImage = imagecreatetruecolor($coverWidth, $coverHeight);        // gerando a imagem
            switch ($newCover['type']) {
                case 'image/jpeg':
                case 'image/jpg':
                    $image = imagecreatefromjpeg($newCover['tmp_name']);
                    break;

                case 'image/png':
                    $image = imagecreatefrompng($newCover['tmp_name']);
                    break;
            }

            imagecopyresampled(        // copiando uma imagem dentro da outra fazendo os devidos cortes
                $finalImage, $image,
                $x, $y, 0, 0,
                $newWidth, $newHeight, $widthOrig, $heightOrig
            );

            $coverName = md5(time() . rand(0, 9999)) . '.jpg';

            imagejpeg($finalImage, './media/covers/' . $coverName, 100);       // salvando a imagem

            $userInfo-> cover = $coverName;          // inserindo a imagem em '$userInfo'

        }
    }

    $userDao->update($userInfo);
}

header("Location: " . $base . "/configuracoes.php");
exit;
