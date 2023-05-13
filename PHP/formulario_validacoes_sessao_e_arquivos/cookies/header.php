<h1>Cabeçalho</h1>
<?php
if(isset($_COOKIE['nome'])) {          // se 'cookie' estiver 'setado' (existir)
    $nome = $_COOKIE['nome'];       // 'cookie' será aramazenado em uma variável
    echo '<h2>'. $nome. '</h2>';        // exibido a variável
}
?>
<hr>