<?php

include 'contato.class.php';
$contato = new Contato();

if(!empty($_GET['id'])) {       // se foi reçebido um i'd'
    $id = $_GET['id'];

    $info = $contato-> getInfo($id);        // guardando na variável '$info' as informações de um contato espeçifico

    if(empty($info['email'])) {     // verificando se 'email' está preenchido
        header("Location: index.php");
        exit;    
    }
} else {
    header("Location: index.php");
    exit;       // 'exit' para garantir que o restante do conteúdo não seja exibido
}

?>

<h1>Editar</h1>

<form method = "POST" action = "editar_submit.php">
    <input type = "hidden" name = "id" value = "<?php echo $info['id']; ?>" />          <!-- 'id' campo oculto para identificar qual é o contato que será modificado -->

    Nome:<br/>
    <input type = "text" name = "nome" value = "<?php echo $info['nome']; ?>" /><br/><br/>
    
    E-mail:<br/>
    <input type = "email" name = "email" value = "<?php echo $info['email']; ?>" /><br/><br/>

    <input type="submit" value = "Salvar" />
</form>