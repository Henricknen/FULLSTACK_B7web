<?php
session_start();        // a liguagem será salva na 'seção' 

if(!empty($_GET['lang'])) {     // verificando foi 'enviado'
    $_SESSION['lang'] = $_GET['lang'];      // troca a linguagem
}

require 'Language.class.php';
$lang = new Language();

?>
<a href="index.php?lang=en">English</a>
<a href="index.php?lang=pt">/ Português</a>
<a href="index.php?lang=es">/ Español</a>
<hr/>
Linguagem definida: <?php echo $lang-> getLanguage(); ?>
<hr/>

<button><?php echo $lang-> get('BUY'); ?></button>     <!-- botão de comprar -->
<a href = ""><?php $lang-> get('LOGOUT'); ?></a>    <!-- botão de sair -->

<?php $lang-> get('AUTHOR'); ?>: Luis Henrique Silva Ferreira