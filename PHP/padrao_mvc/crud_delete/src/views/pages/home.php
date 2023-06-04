<?php $render('header'); ?>      <!-- '$render' puxa um arquivo parçial -->

<a href="<?=$base;?>/novo">Novo Usuario</a>

<table border = "1" width = "100">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>ACOES</th>
    </tr>
    <?php foreach($usuarios as $usuario): ?>
        <tr>
            <td><?=$usuario['id'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['email'];?></td>
            <td>
                <a href="<?=$base;?>/usuario/<?=$usuario['id'];?>/editar">[ editar ]</a>      <!-- inserindo rota de editar no botão -->
                <a href="<?=$base;?>/usuario/<?=$usuario['id'];?>/excluir" onclick="return confirm('Deseja realmente excluir?')">[ excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $render('footer'); ?>