<?php
require 'config.php';

require 'dao/UsuarioDaoMysql.php';      // puxando 'UsuarioDaoMysql.php' da pasta 'dao'

$usuarioDao = new UsuarioDaoMysql($pdo);        // instançiando 'usuarioDao'
$lista = $usuarioDao-> findAll();       // pegando a lista de usúarios
?>

<a href="adicionar.php">ADIÇIONAR</a>       <!-- botão envia dados preenchido pra o arquivos espeçificado em 'href' -->

<table border = "1" width = "100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
        <td><?=$usuario-> getId(); ?></td>      <!-- 1º coluna, 'getId' pega o 'id' do objeto  -->
            <td><?=$usuario-> getNome(); ?></td>        <!-- 2º coluna  -->
            <td><?=$usuario-> getEmail(); ?></td>           <!-- 3º coluna  -->
            <td>                                           <!-- 4º coluna  -->
                <a href="editar.php?id = <?=$usuario-> getId(); ?>">[ Editar ]</a>
                <a href="excluir.php?id = <?=$usuario-> getId(); ?>" onclick = "return confirm('Deseja realmente excluir ?')">[ Excluir ]</a>       <!-- ultilizando 'onclick' para confirmação do usúario -->
            </td>
        </tr>
    <?php endforeach; ?></table>