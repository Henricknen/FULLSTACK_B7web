<h1>Digite o EMAIL ou CPF do usuário</h1>
<form method = "GET">
    <input type = "text" name = "campo" />
    <input type = "submit" name = "pesquisar" />
</form>

<hr/>

<?php

if(!empty($_GET['campo'])) {
    $campo = $_GET['campo'];

    try {
        $pdo = new PDO("mysql:dbname=projeto_pesquisa_colunas;host=localhost", "root", "");
    } catch(PDOException $e) {
        echo "ERRO: ". $e-> getMessage();
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE email = :email OR cpf = :cpf OR nome = :nome";
    $sql = $pdo-> prepare($sql);
    $sql-> bindValue("email", $campo);
    $sql-> bindValue("cpf", $campo);
    $sql-> bindValue("nome", $campo);
    $sql-> execute();

    if($sql-> rowCount() > 0) {
        $sql = $sql-> fetch();

        echo "Nome: ". $sql['nome'];
    }
}

?>