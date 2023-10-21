<?php
require 'config.php';

$id = 0;        // variável 'id' definida com 0
if(isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {       // verificando se os dados forão enviados
    $nome = addslashes($_POST['nome']);     // pegando 'nome'
    $email = addslashes($_POST['email']);       // pegando 'email'
    
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";       // query do tipo 'update'
    $pdo-> query($sql);

    header("Location: index.php");
}

$sql = "SELECT * FROM usuarios WHERE id = '$id'";       // pegando todas informações do usuário de 'id' espeçificado
$sql = $pdo-> query($sql);
if($sql-> rowCount() > 0) {     // se tiver algum resultado
    $dado = $sql-> fetch();       // 'fetch' pega só o primeiro resultado
} else {
    header("Location: index.php");      // se não encontrar usuário retorna para página 'index'
}

?>

<form method = "POST">      <!-- formulario de edição -->
    Nome:<br/>
    <input type = "text" name = "nome" value = "<?php echo $dado['nome']?>"><br/><br/>      <!-- usando 'echo $dado['nome']' para imprimir os dados -->
    E-mail:<br/>
    <input type = "text" name = "email" value = "<?php echo $dado['email']?>"><br/><br/>

    <input type = "submit" value = "Atualizar">
</form>