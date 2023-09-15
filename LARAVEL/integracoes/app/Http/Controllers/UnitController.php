<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function addPerson($id, Request $request) {
        $array = ['error'=> ''];
        
        $validator = Validator::make($request-> all(), [
            'name' => 'required',
            'birthdate' => 'required|date'
        ]);
        if($validator-> fails()) {
            $name = $request-> input('name');
            $birthdate = $request-> input('birthdate');

            $newPerson = new UnitPeople();
            $newPerson-> id_unit = $id;
            $newPerson-> name = $name;
            $newPerson-> birthdate = $birthdate;
            $newPerson-> save();

        } else {
            $array['error'] = $validator-> errors()-> first();
            return $array;
        }
        
        return $array;
    }

    public function addVehicle($id, Request $request) {
        $array = ['error'=> ''];
        
        $validator = Validator::make($request-> all(), [
            'title' => 'required',
            'color' => 'required',
            'plate' => 'required'
        ]);
        if($validator-> fails()) {
            $title = $request-> input('title');
            $color = $request-> input('color');
            $plate = $request-> input('plate');

            $newVehicle = new UnitVehicles();
            $newVehicle-> id_unit = $id;
            $newVehicle-> title = $title;
            $newVehicle-> color = $color;
            $newVehicle-> plate = $plate;
            $newVehicle-> save();

        } else {
            $array['error'] = $validator-> errors()-> first();
            return $array;
        }
        
        return $array;
    }

    public function addPet($id, Request $request) {
        $array = ['error'=> ''];
        
        $validator = Validator::make($request-> all(), [
            'name' => 'required',
            'race' => 'required'
        ]);
        if($validator-> fails()) {
            $name = $request-> input('name');
            $race = $request-> input('race');

            $newPerson = new UnitPeople();
            $newPerson-> id_unit = $id;
            $newPerson-> name = $name;
            $race-> birthdate = $race;
            $newPerson-> save();

        } else {
            $array['error'] = $validator-> errors()-> first();
            return $array;
        }
        
        return $array;
    }
}
