<?php
 
 if(!empty($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    if($codigo == 'L H S F') {
        header("Location: pagina2.php");
    } else {
        echo "Acesso negado!";
    }
 }
 
 ?>

<h1>Página 1</h1>
 <form method = "POST">
    Digite "L H S F" para passar:
    <br><br>

    <input type="text" name="codigo">
    <br><br>

    <input type="submit" value="Enviar">
 </form>