<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Billet;
use App\Models\Unit;

class BilletController extends Controller {
    public function getAll(Request $request) {
        $array = ['error' => ''];

        $property = $request-> input('property');       // pegando a propriedade
        if($property) {
            $user = auth()-> user();        // pegando o usuário logado

            $unit = Unit::where('id', $property)
            -> where ('id_owner', $user['id'])
            -> count();

            if($unit > 0) {
                $billets = Billet::where('id_unit', $property)-> get();     // pegando boletos do usuario logado 

                foreach($billets as $billetKey=> $billetValue) {
                    $billets[$billetKey]['fileurl'] = asset('storage/'. $billetValue['fileurl']);
                }

                $array['list'] = $billets;
            } else {
                $array['error'] = 'Está unidade não te pertençe...';
            }

        } else {
            $array['error'] = 'A propriedade é obrigatoria...';
        }

        return $array;
    }
}
