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
    <h1>Meus anuçios - Adicionar anuncio</h1>
</div

<?php require 'pages/footer.php'; ?>