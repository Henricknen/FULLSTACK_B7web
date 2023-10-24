<?php       // conexão com banco de dados

try {
    $pdo = new PDO("mysql:dbname=projeto_comentarios;host=localhost","root","");
} catch(PDOException $e) {
    echo "Error: ". $e-> getMessage();
    exit;
}

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {       // verificando se foi reçebido dados do formulário
    $nome = $_POST['nome'];
    $menssagem = $_POST['menssagem'];

    $sql = $pdo-> prepare("INSERT INTO menssagens SET nome = :nome, msg = :msg, data_msg = NOW()");      // adição no banco de dados 'NOW()' é uma função do banco de dados que diz a data atual
    $sql-> bindValue(":nome", $nome);       // adiçionando os 'itens'
    $sql-> bindValue(":msg", $menssagem);
    $sql-> execute();
}

?>

<fieldset>      <!-- 'fieldset' é usada para agrupar elementos de um formulário em um conjunto lógico criando bordas ao redor dos grupos de elementos -->
    <form method="POST">
        Nome:<br/>
        <input type = "text" name = "nome" /><br/><br/>
        
        Menssagem:<br/>
        <textarea name = "menssagem"></textarea><br/><br/>

        <input type="submit" value="Enviar menssagem" />
    </form>
</fieldset>
<br /><br />

<?php       // criando a listagem dos itens salvos no banco de dados

$sql = "SELECT * FROM menssagens ORDER BY data_msg DESC";
$sql = $pdo-> query($sql);
if($sql-> rowCount() > 0) {     // verificando se tem menssagens
    foreach($sql-> fetchAll() as $menssagem):

        ?>
        <strong><?php echo $menssagem['nome']; ?></strong><br />        <!-- nome da pessoa será substituido por 'echo $menssagem['nome']' -->
        <?php echo $menssagem['msg']; ?>        <!-- menssagem -->
        <hr />
        <?php

endforeach;
} else {
    echo "Não ha menssagens";
}

?>