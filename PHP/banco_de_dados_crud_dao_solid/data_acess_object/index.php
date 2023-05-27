<?php
require 'config.php';

$lista = [];        // array 'lista'
$sql = $pdo-> query("SELECT * FROM usuarios");     // puxando os dados da tabela 'usuarios', para exibir todos os usúarios cadastrados
if($sql-> rowCount() > 0) {     // verificando se há algum registro
    $lista = $sql-> fetchAll(PDO::FETCH_ASSOC);       // 'fetchAll' criará um array de registros que será adiçionado no array 'lista', 'PDO::FETCH_ASSOC' faz as assoçiações de campos
}
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
            <td><?=$usuario['id']; ?></td>      <!-- 1º coluna  -->
            <td><?=$usuario['nome']; ?></td>        <!-- 2º coluna  -->
            <td><?=$usuario['email']; ?></td>           <!-- 3º coluna  -->
            <td>                                           <!-- 4º coluna  -->
                <a href="editar.php?id = <?=$usuario['id']; ?>">[ Editar ]</a>
                <a href="excluir.php?id = <?=$usuario['id']; ?>" onclick = "return confirm('Deseja realmente excluir ?')">[ Excluir ]</a>       <!-- ultilizando 'onclick' para confirmação do usúario -->
            </td>
        </tr>
    <?php endforeach; ?>
</table>