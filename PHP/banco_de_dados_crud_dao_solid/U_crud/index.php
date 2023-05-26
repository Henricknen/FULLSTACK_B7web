<?php
require 'config.php';

$lista = [];        // array 'lista'
$sql = $pdo-> query("SELECT * FROM usuarios");     // puxando os dados da tabela 'usuarios', para exibir todos os usúarios cadastrados
if($sql-> rowCount() > 0) {     // verificando se há algum registro
    $lista = $sql-> fetchAll(PDO:: FETCH_ASSOC);       // 'fetchAll' criará um array de registros que será adiçionado no array 'lista', 'PDO:: FETCH_ASSOC' faz as assoçiações de campos
}
?>

<a href = "adicionar.php">ADIÇIONAR</a>        <!-- botão envia dados preenchidos pra o arquivos especificados em 'href' -->

<table border = "1" width = "100%">
    <tr>
        <th> ID </th>
        <th> NOME </th>
        <th> E-MAIL </th>
        <th> AÇÕES </th>
    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td>
                <a href="editar.php ? id = <?php echo $usuario['id']; ?>">[ Editar ]</a>     <!-- botão de ação 'editar' -->
                <a href="excluir.php ? id = <?php echo $usuario['id']; ?>">[ Excluir ]</a>       <!-- botão de ação 'excluir' -->
            </td>
        </tr>
    <?php endforeach ?>
</table>