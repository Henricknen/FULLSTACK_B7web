<?php $render('header'); ?>

<h2>Editar usuário</h2>

<form method="POST" action="<?=$base;?>/usuario/<?=$usuario['id'];?>/editar">
    <label>
        Nome:<br>
        <input type="text" name="name" value="<?=$usuario['nome'];?>"/>
    </label><br><br>

    <label>
        E-mail:<br>
        <input type="email" name="email" value="<?=$usuario['email'];?>"/>
    </label><br><br>

    <input type="submit" value="Salvar" />
</form>

<?php $render('footer'); ?>