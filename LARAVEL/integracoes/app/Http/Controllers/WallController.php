<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Wall;
use App\Models\WallLike;

class WallController extends Controller {
    public function getAll() {
        $array = ['error'=> '', 'list'=> []];       // 'list' retorna uma lista vazia ou com os itens caso tenha-os

        $user = auth()-> user();        // pegando o usuário logado

        $walls = Wall::all();        // pegando todos avisos do mural

        foreach($walls as $wallKey=> $wallValue) {      // complementando as informações de 'wall'
            $walls[$wallKey]['liked'] = 0;
            $walls[$wallKey]['liked'] = false;

            $likes = WallLike::where('id_wall', $wallValue['id'])-> count();        // pegando quantidade total de 'likes'
            $walls[$wallKey]['liked'] = $likes;     // atualizando a quantidade de 'likes'

            $melikes = WallLike::where('id_wall', $wallValue['id'])     // procura na tabela 'WallLikes' algum registro em que eu dei um 'like'
            ->where('id_user', $user['id'])
            ->count();

            if($melikes > 0) {
                $walls[$wallKey]['liked'] = true;
            }
        }

        $array['list'] = $walls;

        return $array;
    }

    public function like($id) {
        $array = ['error' => ''];

        $user = auth()-> user();
        $melikes = WallLike::where('id_wall', $id)      // procurando uma postagem
        ->where('id_user', $user['id'])     // em que o usuário logado deu 'like'
        ->count();

        if($melikes > 0) {
            WallLike::where('id_wall', $id)     // processo de remoção do 'like'
            ->where('id_user',$user['id'])
            -> delete();
            $array['liked'] = false;        // removendo os 'like'
        } else {
            $newLike = new WallLike();
            $newLike-> id_wall = $id;
            $newLike-> id_user = $user['id'];
            $newLike-> save();
            $array['liked'] = true;     // adiçionando 'like'
        }

        $array['likes'] = WallLike::where('id_wall', $id)-> count();        // verificando quantos regitros de 'likes' tem 

        return $array;
    }
}
