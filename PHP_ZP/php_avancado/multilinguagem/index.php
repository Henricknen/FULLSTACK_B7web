<?php
session_start();

require 'Language.class.php';
$lang = new Language();

?>
<a href="index.php?lang=en">English</a>
<a href="index.php?lang=pt">Português</a>
<hr/>

<button><?php echo $lang-> get('BUY'); ?></button>