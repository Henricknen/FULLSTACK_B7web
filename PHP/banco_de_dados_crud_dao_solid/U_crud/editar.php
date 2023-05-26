<?php
require 'config.php';

$info =[];       // array 'info' terá as informações do usúario

$id = filter_input( INPUT_GET, 'id');
if($id) {

    $sql = $pdo-> prepare("SELECT * FROM usuarios WHERE id = :id");        // procurando o 'id' ultilizando função 'prepare'
    $sql-> bindValue('id', $id);
    $sql-> execute();

    if($sql-> rowCount() > 0) {     // função 'rowCount' verifica se encontrou registros
        $info = $sql-> fetch( PDO:: FETCH_ASSOC );        // preenchendo as informações dos usúarios, 'fetch' pega o primeiro item
    } else {
        header("Location: index.php");      // se não encontrar nada redireçiona o usúario para página 'index.php'
    }

} else {
    header('Location: index.php');      // se não haver dados redireçiona o usúario para página 'index.php'
    exit;
}
?>
<h1>Editar usuário...</h1>
<form method = "POST" action = "editar_action.php">
<label>
    Nome:<br>
    <input type="text" name = "name" value = "<?php echo $usuario['nome']; ?>">
</label><br><br>

<label>
    E-mail:<br>
    <input type="text" name = "email" value = "<?php echo $usuario['nome']; ?>">
</label><br><br>

<input type = "submit" value = "Salvar">
</form>