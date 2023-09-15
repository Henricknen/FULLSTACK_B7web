<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unit;
use App\Models\UnitPeople;
use App\Models\UnitVehicles;
use App\Models\UnitPet;

class UnitController extends Controller {
    public function getInfo($id) {      // rotas das unidades reçeberá um 'id'
        $array = ['error' => ''];

        $unit = Unit::find($id); // verificando se 'id' é de uma unidade existente
        if ($unit) {

            $peoples = UnitPeople::where('id_unit', $id)->get();     // pegando informações de 'people', 'vehicles' e 'pets'
            $vehicles = UnitVehicles::where('id_unit', $id)->get();
            $pets = UnitPet::where('id_unit', $id)->get();

            foreach($peoples as $pKey=> $pValue) {
                $poples[$pKey]['birthdate'] = date('d/m/Y', strtotime($pValue['birthdate']));       // correção da data de nasçimento
            }

            $array['peoples'] = $peoples;       // jogando as informações dentro dos arrays correpondentes
            $array['vehicles'] = $vehicles;
            $array['pets'] = $pets;

        } else {
            $array['error'] = 'Propriedade inexistente';
            return $array;
        }

        return $array;
    }
}
