<?php

session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'classes/documentos.class.php';

if(!isset($_SESSION['logado'])) {       // verificando se usário esta 'logado'
    header("Location: login.php");
    exit;
}

$usuarios = new Usuarios($pdo);
$usuarios-> setUsuario($_SESSION['logado']);       // definindo (set) o usuário logado

$documentos = new Documentos($pdo);
$lista = $documentos-> getDocumentos();

?>
<h1>Sistema</h1>

<?php if($usuarios-> temPermissao('ADD')): ?>       <!-- para mostra o botão 'Adicionar documento...' usuário tem que ter a permissão 'ADD' -->
<a href="">Adicionar documento...</a>
<?php endif; ?>

<?php if($usuarios-> temPermissao('SECRET')): ?>
<a href="secreto.php">Página secreta...</a>     <!-- este botão só aparecerá se usuário tiver a permissão 'SECRET' -->
<?php endif; ?>

<table border = "1" width = "100%">
    <tr>
        <th>Nome do arquivo</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $item): ?>
        <tr>
            <td><?php echo utf8_encode($item['titulo']); ?></td>
            <td>
                <?php if($usuarios-> temPermissao('EDIT')): ?>      <!-- verificando se tem permissão 'EDIT' -->
                <a href="">ditar</a>
                <?php endif; ?>
                <?php if($usuarios-> temPermissao('DEL')): ?>      <!-- verificando se tem permissão 'DEL' -->
                <a href="">Ecluir</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>