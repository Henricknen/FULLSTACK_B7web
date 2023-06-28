<?php

require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$array = ['error' => ''];

$postDao = new PostDaoMysql($pdo);

if(isset($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {       // verificando se foi reçebida alguma imagem
    $photo = $_FILES['photo'];
    // fazendo o tratamento da imagem
    if(in_array($photo['type'], ['image/png', 'image/jpg', 'image/jpeg', ])) {        // tipos de 'type' aççeitos

        list($widthOrig, $heightOrig) = getimagesize($photo['tmp_name']);       // tamanho original da imagem
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $maxHeight;     // chegando ao mínimo viável
        $newHeight = $newWidth / $ratio;

        if($newHeight < $maxHeight) {
            $newHeight = $maxHeight;
            $newHeight = $newHeight * $ratio;
        }

        $finalImage = imagecreatetruecolor($newWidth, $newHeight);        // criação da imagem
        switch ($photo["type"]) {
            case 'image/jpeg':
            case 'image/jpg':
                $img = imagecreatefromjpeg($photo['tmp_name']);
            break;
            case 'image/png':
                $img = imagecreatefrompng($photo['tmp_name']);
            break;
        }

        imagecopyresampled(     // copiando uma imagem dentro da outra
            $finalImage, $image,        // 'image' imagem que será copiada
            0, 0, 0, 0,     // posições
            $newWidth, $newHeight, $widthOrig, $heightOrig      // largura e altura novos e original
        );

        $photoName = md5(time(). rand(0, 9999)). '.jpg';        // gerando um nome alatorio para a imagem cria
        imagejpeg($finalImage, 'media/uploads/'. $photoName);        // local onde imagem será salva

        $newPost = new Post();      // criando um 'Post'
        $newPost-> id_user = $userInfo-> id;
        $newPost-> type = 'photo';
        $newPost-> created_at = date('Y-m-d H:i:s');
        $newPost-> body = $photoName;

        $postDao-> insert($newPost);        // inserindo um novo 'Post'

    } else {
        $array['error'] = "Arquivo não suportado (jpg ou png)...";
    }

} else {
    $array['error'] = 'Nenhuma imagem enviada...';
}

header("Content-Type: application/json");
echo json_encode($array);       // retornando o 'array' transformando em 'json'
exit;