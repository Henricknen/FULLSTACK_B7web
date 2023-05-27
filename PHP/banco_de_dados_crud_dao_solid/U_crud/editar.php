<?php
require 'config.php';

$info = [];       // array 'info' terá as informações do usúario
$id = filter_input( INPUT_GET, 'id');       // pegando os dados pelo 'id'
if($id) {       // verificando se foi enviado algun dado para 'id'

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");        // procurando o 'id' ultilizando função 'prepare'
    $sql-> bindValue(':id', $id);       // substituindo os dados
    $sql-> execute();

    if($sql-> rowCount() > 0) {     // função 'rowCount' verifica se encontrou registros
        $info = $sql->fetch( PDO::FETCH_ASSOC );        // preenchendo as informações dos usúarios na variável '$info', 'fetch' pega o primeiro item
    } else {
        header("Location: index.php");      // se não encontrar nada redireçiona o usúario para página 'index.php'
        exit;
    }
} else {
    header("Location: index.php");      // se não haver dados redireçiona o usúario para página 'index.php'
    exit;
}
?>

<h1>Editar usuário...</h1>

<form method="POST" action="editar_action.php">
<input type="hidden" name="id" value="<?=$info['id']; ?>" />     <!-- mandando 'id' em um campo oculto 'hidden' -->
    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$info['nome']; ?>"  />
    </label><br/><br/>

    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?=$info['email']; ?>" />
    </label><br/><br/>

    <input type = "submit" value = "Salvar">
</form>