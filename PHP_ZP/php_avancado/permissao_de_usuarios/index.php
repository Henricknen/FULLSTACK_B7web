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

<a href="">Adicionar documento...</a>

<table border = "1" width = "100%">
    <tr>
        <th>Nome do arquivo</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $item): ?>
        <tr>
            <td><?php echo utf8_encode($item['titulo']); ?></td>
            <td>
                <a href="">ditar</a>
                <a href="">Ecluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>