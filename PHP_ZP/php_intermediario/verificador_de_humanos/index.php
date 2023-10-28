<?php

session_start();

$n1 = rand(0, 10);      // 'rand' gera os números aleatóriamente
$n2 = rand(0, 10);

$_SESSION['v'] = $n1 + $n2;     // somando os dois números aleatórios e salavndo os na seção 'SESSION'
 
?>

<h2>Verificador de Humanos</h2>

<form method="POST" action="verificador.php">

<?php echo $n1; ?> + <?php echo $n2; ?> =       <!-- mostrando os números aleatórios gerado pelo 'rand' com sinal '+' entre eles -->

<input type="number" name="n" />        <!-- n'n' umero que usuário tem que digitar -->

<input type="submit" value="Verificar" />

</form>