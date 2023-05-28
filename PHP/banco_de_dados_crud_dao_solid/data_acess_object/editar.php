<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';      // puxando 'UsuarioDaoMysql.php' da pasta 'dao'

$usuarioDao = new UsuarioDaoMysql($pdo);        // instançiando 'usuarioDao'


$usuario = false;       // '$usuario' iniçialmente será um boolean 'false'

$id = filter_input(INPUT_GET, 'id');       // pegando o 'id'

if($id) {       // verificando o 'id'

    $usuario =$usuarioDao-> findById($id);      // substitui o '$usuario' por 'false' se não achar ou pela 'instançia da classe' se encontrar

}
if($usuario === false) {        // se '$usuario' for igual a 'false'
    header("Location: index.php");
    exit; 
}
?>

<h1>Editar usuário...</h1>

<form method = "POST" action = "editar_action.php">
    <input type="hidden" name="id" value="<?=$usuario->getId();?>" />

    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$usuario->getNome();?>" />       <!-- fazendo verificação se variável '$usúario' existe -->
    </label><br/><br/>

    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?=$usuario->getEmail();?>" />
    </label><br/><br/>

    <input type="submit" value="Salvar" />
</form>