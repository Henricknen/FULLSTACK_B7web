<?php require 'pages/header.php'; ?>
<?php

if(empty($_SESSION['cLogin'])) {
    ?>
    <script type ="text/javascript">window.location.href = "login.php";</script>
    <?php
    exit;
}
?>
<div class="container">
    <h1>Meus anuçios</h1>

    <a href = "add_anuncio.php" class = "btn btn-default">Adiçionar Anunçio</a>

    <table class="table table-striped">
        <head>
            <tr>Foto</tr>
            <tr>Título</tr>
            <tr>Valor</tr>
            <tr>Ações</tr>
        </head>
        <?php
        require 'classes/anuncios.class.php';
        $a = new Anuncios();
        $anuncios = $a-> getMeusAnuncios();

        foreach($anuncios as $anuncio):
        ?>
        <tr>
            <td><img src = "assets/images/anuncios/<?php echo $anuncios['url']; ?>" border = ""></td>
            <td><?php echo $anuncio['titulo']; ?></td>
            <td><?php echo number_format($anuncio['valor'], 2);?></td>
            <td></td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>

<?php require 'pages/footer.php'; ?>