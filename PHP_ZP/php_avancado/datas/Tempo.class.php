<?php
class Tempo {

	static public function diferenca($dt) {		// método estático para calcular a diferença entre a data fornecida e o momento atual
		$time = strtotime($dt);		// converte a data fornecida em um 'timestamp'

		$now = time();		// obtém o timestamp atual

		$dif = $now - $time;		// calcula a diferença em segundos

		if($dif > ((24*60)*60)) {		// verifica se a diferença é maior que um dia
			$dif = (($dif / 60) / 60);			// Calcula a diferença em dias

			$t = floor($dif/24);			// Calcula o número de dias

			return $t.' dia'.(($t==1)?'':'s');			// retorna a quantidade de dias com a devida forma plural ou singular
		} else {

			$dif = (($dif / 60) / 60);			// calcula a diferença em horas

			if(floor($dif*60*60) < 60) {			// verifica se a diferença é inferior a uma hora
				$t = floor($dif*60*60);				// calcula a diferença em segundos


				return $t.' segundo'.(($t==1)?'':'s');				// retorna a quantidade de segundos com a devida forma plural ou singular
			} elseif($dif < 1) {
				
				$t = floor($dif*60);		// calcula a diferença em minutos

				return $t.' minuto'.(($t==1)?'':'s');		// retorna a quantidade de minutos com a devida forma plural ou singular
			} else {
				
				$t = floor($dif);		// calcula a diferença em horas

				return $t.' hora'.(($t == 1)?'':'s');		// retorna a quantidade de horas com a devida forma plural ou singular
			}
		}

		return $dif;		// retorna a diferença em segundos como padrão
	}

}
?>
