<form method="POST">
	Calculadora de Imposto<br/><br/>

	Valor do produto:<br/>
	<input type="text" name="produto" /><br/><br/>

	Taxa de imposto (em %):<br/>
	<input type="text" name="pct" /><br/><br/>

	<input type="submit" value="Calcular" />
</form>

<?php
if(!empty($_POST['produto'])) {		// Verificando se o campo 'produto' no formulário não está vazio
	$p = floatval($_POST['produto']);		// 'floatval' converte o valor do campo 'produto' em um número de ponto flutuante (float)
	$pct = floatval($_POST['pct']);
	$imp = (($pct/100)*$p);			// calcula o valor do imposto com base na taxa de imposto inserida
	$pimp = $p - $imp;		// calcula o valor do produto após deduzir o imposto

	echo "Valor do produto: R$ ".$p."<br/>";
	echo "Taxa de imposto: ".$pct."%<br/><hr/>";
	echo "Imposto: R$ ".$imp."<br/>";
	echo "Produto: R$ ".$pimp."<br/>";
}
?>
