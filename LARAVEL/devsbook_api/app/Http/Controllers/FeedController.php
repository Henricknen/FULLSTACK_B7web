<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FeedController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this-> middleware('auth:api');
        $this-> loggedUser = auth()-> user();
    }

    public function create(Request $request) {      // m
        $array['error'] = '';
        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];

        $type = $request-> input('type');       // pegando os dados que estão sendo enviados
        $body = $request-> input('body');
        $photo = $request-> file('photo');

        if($type) {

            switch($type) {
                case 'text':
                    if(!$body) {
                        $array['error'] = 'Texto não enviado...';
                        return $array;
                    }
                break;
                case 'photo':                    
                if($photo) {
                    if(in_array($photo-> getClientMimeType(), $allowedTypes)) {     // verificando foto
                        $filename = md5(time(). rand(0, 9999)). 'jpd';

                        $destPath = public_path('/media/uploads');      // pasta de destino

                        $img = Image::make($photo-> path())
                        -> resize(800, null, function($contranint) {        // tratamento da imagem
                            $contranint-> aspectRatio();
                        })
                        -> save($destPath. '/'. $filename);

                        $body-> $filename;
                    } else {
                        $array['error'] = 'Arquivo não suportado...';
                        return $array;
                    }
                } else {
                    $array['error'] = 'Arquivo não enviado...';
                    return $array;
                }
                break;
                default:
                    $array['error'] = 'Tipo de postagem inexistente...';
                    return $array;
                    break;
            }

            if($body) {
                $newPost = new Post();      // criando o 'post'
                $newPost-> id_user = $this-> loggedUser['id'];     // preenchendo os dados do 'post'
                $newPost-> type = $type;
                $newPost-> created_at = date('Y-m-d H:i:s');
                $newPost-> body = $body;
                $newPost-> save();
            }

        } else {
            $array['error'] = 'Dados não enviados...';
            return $array;
        }

        return $array;
    }
}
