<?php
require 'config.php';

if(isset($_GET['id']) && empty($_GET['id']) == false) {     // pegando o 'id' espeçifico do usuário
    $id = addslashes($_GET['id']);

    $sql = "DELETE FROM usuarios WHERE id = '$id'";     // deletando usuário de 'id' espeçificado
    $pdo-> query($sql);

    header("Location: index.php");
    
} else {
    header("Location: index.php");
}

?>