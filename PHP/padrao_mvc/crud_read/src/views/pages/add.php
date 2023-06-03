<?php $render('header'); ?>

<h2>Adiçionar novo usuário</h2>

<form method="POST" action="<?=$base;?>/novo">
    <label>
        Nome:<br>
        <input type="text" name="name">
    </label><br><br>

    <label>
        E-mail:<br>
        <input type="email" name="email">
    </label><br><br>

    <input type="submit" value="Adiçionar">
</form>

<?php $render('footer'); ?>