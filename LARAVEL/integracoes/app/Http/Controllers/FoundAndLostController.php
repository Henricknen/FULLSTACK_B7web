<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\FoundAndLost;

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

    public function insert(Request $request) {      // inserindo regitro na lista
        $array = ['error'=> ''];
        
        $validator = Validator::make($request-> all(), [        // criando regras de validação
            'description'=> 'required',
            'where'=> 'required',
            'photo'=> 'required|file\mimes: jpg, npg'
        ]);

        if(!$validator-> fails()) {     // verificando se deu tudo certo na validação
            $description = $request-> input('descripition');        // pegando os itens
            $where = $request-> input('where');
            $file = $request-> file('photo')-> store('public');     // salvando 'photo'
            $file = explode('public/', $file);
            $photo = $file[1];

            $newLost = new FoundAndLost();      // enserindo os regitros no banco de dados
            $newLost-> status = 'LOST';
            $newLost-> photo = $photo;
            $newLost-> description = $description;
            $newLost-> where = $where;
            $newLost-> datecreated = date('Y-m-d');
            $newLost-> save();
            
        } else {
            $array['error'] = $validator-> errors()-> first();
            return $array;
        }
        
        return $array;
    }
}
