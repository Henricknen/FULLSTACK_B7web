<?php
class Aulas extends model {

	public function getAulas($id_modulo) {
		$array = array();		// array vai conter 'todas' as aulas do modulo espeçifico

		$sql = "SELECT * FROM aulas WHERE id_modulo = :id_modulo";
		$sql = $this-> db-> prepare($sql);
		$sql-> bindValue(":id_modulo", $id_modulo);
		$sql-> execute();

		if($sql-> rowCount() > 0) {		// verificando se tem aula neste modulo espeçifico

			$array = $sql-> fetchAll();

		}

		return $array;
	}

}