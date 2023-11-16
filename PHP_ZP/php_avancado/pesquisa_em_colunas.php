<h1>Digite o EMAIL ou CPF do usuário</h1>
<form method = "GET">       <!-- formulário de pesquisa  -->
    <input type = "text" name = "campo" />
    <input type = "submit" name = "pesquisar" />
</form>

<hr/>

<?php

if(!empty($_GET['campo'])) {        // verifica se o 'campo' está ou não está vazio
    $campo = $_GET['campo'];

    try {
        $pdo = new PDO("mysql:dbname=projeto_pesquisa_colunas;host=localhost", "root", "");     // conectando ao banco de dados 'projeto_pesquisa_colunas'
    } catch(PDOException $e) {
        echo "ERRO: ". $e-> getMessage();
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE email = :email OR cpf = :cpf OR nome = :nome";     // seleçionando todos os vcampos da tabela 'usuarios' onde o 'email' ou o 'cpf' for igual ao digitado no formulário
    $sql = $pdo-> prepare($sql);
    $sql-> bindValue("email", $campo);
    $sql-> bindValue("cpf", $campo);
    $sql-> bindValue("nome", $campo);
    $sql-> execute();

    if($sql-> rowCount() > 0) {     // verificando se a 'busca' funçionou
        $sql = $sql-> fetch();          // obténdo o resultado da consulta

        echo "Nome: ". $sql['nome'];        // exibindo na tela o nome do usuário 'pesquisado'
    }
}

?>