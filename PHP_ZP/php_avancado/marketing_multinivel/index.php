<?php
session_start();        // iniçiando 'seção'
require 'config.php';
require 'funcoes.php';

if(empty($_SESSION['mmnlogin'])) {          // verificando se a seção está 'vazia' ou 'não' existir
    header("Location: login.php");      // redireçiona o usuário para página de login
    exit;
}

$id = $_SESSION['mmnlogin'];

$sql = $pdo-> prepare("SELECT nome FROM usuarios WHERE id = :id");      // puchando 'nome' do usuário logado através do 'id'
$sql-> bindValue(":id", $id);
$sql-> execute();

if($sql-> rowCount() > 0) {     // verificando se encontrou algum resultado
    $sql = $sql-> fetch();
    $nome = $sql['nome'];       // armazenando o nome do usuário dentro da variável 'nome'
} else {
    header("Location: login.php");
    exit;
}

$lista = array();        // lista iniçia como um 'array vazio'

$sql = $pdo-> prepare("SELECT * FROM usuarios WHERE id_pai = :id");     // pegando informações cadastradaas pelo usuário logado
$sql-> bindValue(":id", $id);
$sql-> execute();
if($sql-> rowCount() > 0) {
    $lista = $sql-> fetchAll();
}

?>

<h1>Sistema de Marketing Multinivel</h1>
<h2>Usuário Logado: <?php echo $nome; ?></h2>

<a href="cadastro.php">Cadastrar Novo Usuário/</a>

<a href="sair.php">Sair</a>

<hr/>

<h4>Lista de cadastros</h4>

<ul>
    <?php foreach($lista as $usuario): ?>       <!-- ultilizando 'foreach' para pegar a lista de cadastro -->
        <li><?php echo $usuario['nome']; ?></li>
    <?php endforeach; ?>
</ul>