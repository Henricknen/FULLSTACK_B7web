<?php
$vendas = array(10,20,30,40,20);
$custos = array(8,15,37,97,35);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Projeto de  Gráficos</title>
</head>
<body>

	<div style = "width:500px">
		<canvas id = "grafico"></canvas>		<!-- grafico -->
	</div>
	
	<script type = "text/javascript" src="Chart.min.js"></script>		<!-- importando biblioteca 'Charrt.min.js' -->
	<script type ="text/javascript">
		window.onload = function(){		// 'onload' roda este código após a página ser totalmente carregada
			var contexto = document.getElementById("grafico").getContext("2d");
			var grafico = new Chart(contexto, {		// iniçiação da biblioteca 'Chart'
				type: 'bar',		// grafica em 'colunas'
				data: {
					labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],		// 'labels' é um array de dados
					datasets: [{
						label:'Vendas',
						backgroundColor:'#FF0000',
						borderColor:'#FF0000',
						data:[<?php echo implode(',', $vendas); ?>],		// 'implode' pucha o array de vendas, separando por vígulas
						fill:false
					}, {
						label:'Custos',
						backgroundColor:'#00FF00',
						borderColor:'#00FF00',
						data:[<?php echo implode(',', $custos); ?>],
						fill:false
					}]
				}
			});
		}		
	</script>
</body>
</html>