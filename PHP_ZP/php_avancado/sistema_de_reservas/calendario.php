<?php
$data = '2017-02';
$dia1 = date('w', strtotime($data));
$dias = date('t', strtotime($data));
$linhas = ceil(($dia1+$dias) / 7);
$dia1 = -$dia1;
$data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));
$data_fim = date('Y-m-d', strtotime(( ($dia1 + ($linhas*7) - 1) ).' days', strtotime($data)));

echo "PRIMEIRO DIA: ".$dia1."<br/>";
echo "TOTAL DIAS: ".$dias."<br/>";
echo "LINHAS: ".$linhas."<br/>";
echo "DATA INICIO: ".$data_inicio."<br/>";
echo "DATA FIM: ".$data_fim."<br/>";
?>
<table border="1" width="100%">
	<tr>
		<th>Dom</th>
		<th>Seg</th>
		<th>Ter</th>
		<th>Qua</th>
		<th>Qui</th>
		<th>Sex</th>
		<th>Sab</th>
	</tr>
	<?php for($l=0;$l<$linhas;$l++): ?>
		<tr>
			<?php for($q=0;$q<7;$q++): ?>
			<?php
			$w = date('d', strtotime(($q+($l*7)).' days', strtotime($data_inicio)) );
			?>
			<td><?php echo $w; ?></td>
			<?php endfor; ?>
		</tr>
	<?php endfor; ?>
</table>










