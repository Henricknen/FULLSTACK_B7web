<?php
require 'config.php';

require 'dao/UsuarioDaoMysql.php';      // puxando 'UsuarioDaoMysql.php' da pasta 'dao'

$usuarioDao = new UsuarioDaoMysql($pdo);        // instançiando 'usuarioDao'
$lista = $usuarioDao-> findAll();       // pegando a lista de usuários
?>

<a href="adicionar.php">ADIÇIONAR</a>       <!-- botão envia dados preenchido pra o arquivos espeçificado em 'href' -->

            <td><?=$usuario-> getEmail(); ?></td>           <!-- 3º coluna  -->
            <td>                                           <!-- 4º coluna  -->
                <a href="editar.php?id = <?=$usuario-> getId(); ?>">[ Editar ]</a>
                <a href="excluir.php?id = <?=$usuario-> getId(); ?>" onclick = "return confirm('Deseja realmente excluir ?')">[ Excluir ]</a>       <!-- ultilizando 'onclick' para confirmação do usuário -->
            </td>
        </tr>
    