<?php
session_start();        // iniçiando 'seção'
require 'config.php';
require 'funcoes.php';

if(empty($_SESSION['mmnlogin'])) {          // verificando se a seção está 'vazia' ou 'não' existir
    header("Location: login.php");      // redireçiona o usuário para página de login
    exit;
}

$id = $_SESSION['mmnlogin'];

$sql = $pdo-> prepare("SELECT 
usuarios.nome, patentes.nome as p_nome 
FROM usuarios LEFT JOIN patentes ON patentes.id = usuarios.patente 
WHERE usuarios.id = :id");      // puchando 'nome' do usuário logado através do 'id'
$sql-> bindValue(":id", $id);
$sql-> execute();

if($sql-> rowCount() > 0) {     // verificando se encontrou algum resultado
$sql = $sql-> fetch();
    $nome = $sql['nome'];       // armazenando o nome do usuário dentro da variável 'nome'
    $p_nome = $sql['p_nome'];
} else {
    header("Location: login.php");
    exit;
}

$lista = listar($id, $limite);       // chamando função 'listar' passando o 'id' do usuário logado e o 'limite' de itens filhos como parâmetro
    
?>

<h1>Sistema de Marketing Multinivel</h1>
<h2>Usuário Logado: <?php echo $nome. ' ('. $p_nome. ')'; ?></h2>

<a href="cadastro.php">[Cadastrar Novo Usuário] -</a>

<a href="sair.php">[Sair]</a>

<hr/>

<h4>Lista de cadastros</h4>

<?php exibir($lista); ?>    <!-- ultilizando a função exibir e passando a lista  -->