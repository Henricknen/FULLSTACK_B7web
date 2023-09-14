<?php

namespace App\Http\Controllers;

use App\Models\FoundAndLost;
use Illuminate\Http\Request;

class FoundAndLostController extends Controller {
    public function getAll(Request $request) {
        $array = ['error'=> ''];
        
        $lost = FoundAndLost::where('status', 'LOST')       // pegando a lista dos 'perdidos'
        -> orderBy('datecreated', 'DESC')
        -> orderBy('id', 'DESC')
        -> get();
        
        $recovered = FoundAndLost::where('status', 'RECOVERED')     // pegando a lista dos 'achados'
        -> orderBy('datecreated', 'DESC')
        -> orderBy('id', 'DESC')
        -> get();

        foreach($lost as $lostKey=> $lostValue) {
            $lost[$lostKey]['datecreated'] = date('d/m/Y', strtotime($lostValue['datecreated']));       // corrigindo a data
            $lost[$lostKey]['photo'] = asset('storage/'. $lostValue['photo']);       // corrigindo a foto
        }

        foreach($recovered as $recKey=> $recValue) { 
            $recovered[$recKey]['datecreated'] = date('d/m/Y', strtotime($recValue['datecreated']));
            $recovered[$recKey]['photo'] = asset('storage/'. $recValue['photo']);
        }

        $array['lost'] = $lost;     // jogando itens perdidos dentro do array 'lost'
        $array['recovered'] = $recovered;     // jogando itens achados dentro do array 'recovered'
        
        return $array;
    }
}
