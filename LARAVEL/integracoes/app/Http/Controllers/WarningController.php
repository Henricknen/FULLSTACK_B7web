<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\warning;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WarningController extends Controller {
    public function getMyWarnings(Request $request) {
		$array = ['error'=> ''];

		$property = $request-> input('property');
		if($property) {

			$user = auth()-> user();        // pegando o usuário logado

            $unit = Unit::where('id', $property)
            -> where ('id_owner', $user['id'])
            -> count();

            if($unit > 0) {
				$warnings = Warning::where('id_unit', $property)		// pegando os 'warning' dessa unidade espeçifica
				-> orderBy('datecreated', 'DESC')		// ordenando pela data que foi criada
				-> orderBy('id', 'DESC')
				-> get();		// 'get' pega a lista completa

				foreach($warnings as $warnKey=> $warnValue) {
					$warnings[$warnKey]['datecreated'] = date('d/m/Y', strtotime($warnValue['datecreated']));		// formatando a data
					$photolist = [];
					$photos = explode(', ', $warnValue['photos']);		// tratando 'photos'
					foreach($photos as $photo) {
						if(!empty($photo)) {
							$photolist[] = asset('storage/'. $photo);
						}
					}

					$warnings[$warnKey]['photos'] = $photolist;
				}

				$array['list'] = $warnings;

			} else {
				$array['error'] = 'Está unidade não te pertençe...';
			}

		} else {
			$array['error'] = 'A propriedade é neçessaria';
		}

		return $array;
	}

	public function addWarningFile(Request $request) {
        $array = ['error'=> ''];

        $validator = Validator::make($request-> all, [		// Validando campo 'photo'
            'photo'=> 'required|mimes:jpg,png'		// tipos permitidos
        ]);

        if(!$validator-> fails()) {
            $file = $request-> file('photo')-> store('public');		// salvando 'photo' no 'storage' padrão

            $array['photo'] = asset(Storage::url($file));		// criação da 'url' para ser exibida
        } else {
            $array['error'] = $validator-> erros()-> first();
            return $array;
        }

        return $array;
    }
	
	public function setWarnings(Request $request) {
		$array = ['error'=> ''];
		
		$validator = Validator::make($request-> all(), [
			'title'=> 'required',		// regras
			'property'=> 'required'
		]);
		if(!$validator-> fails()) {		// verificando se 'validator' não deu nenhuma falha
			$title = $request-> input('title');
			$property = $request-> input('property');		// pegando os dados
			$list = $request-> input('list');

			$newWarn = new Warning();		// propriedades que novo aviso terá
			$newWarn-> id_unit = $property;
			$newWarn-> title = $title;
			$newWarn-> status = 	'IN_REVIEW';
			$newWarn-> datecreated = date('Y-m-d');

			if($list && is_array($list)) {		// verificando se 'lista' tem itens e é um array
				$photos = [];
				foreach($list as $listItem) {
					$url = explode('/', $listItem);
					$photos[] = end($url);		// pegando o último intem do array 'photo' que será praticamente o 'nome' da foto
				}
				$newWarn-> photos = implode(',', $photos);
			} else {
				$newWarn-> photos = '';		// definido um valor padrão para o campo 'photos'
			}

			$newWarn->  save();		// salvando a ocorrençia

		} else {
			$array['error'] = $validator->erros()-> firts();
			return $array;
		}

		return $array;
	}
}
