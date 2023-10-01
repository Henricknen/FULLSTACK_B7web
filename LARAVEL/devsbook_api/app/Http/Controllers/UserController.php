<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\UserRelation;
use Nette\Utils\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this-> middleware('auth:api');

        $this-> loggedUser = auth()-> user();
    }

    public function update(Request $request) {
        $array = ['error'=> ''];

        $name = $request-> input('name');       // pegando valores que serão enviados para criação do usuário
        $email = $request-> input('email');
        $birthdate = $request-> input('birthdate');
        $city = $request-> input('city');
        $work = $request-> input('work');
        $password = $request-> input('password');
        $password_confirm = $request-> input('password_confirm');

        $user = User::find($this-> loggedUser['id']);      // pegando o usuário

        if($name) {
            $user-> name = $name;
        }

        if($email) {
            if($email != $user-> email) {       // verificando se o email que usuário mandar é diferente do email atual
                $emailExits = User::where('email', $email)-> count();
                if($emailExits === 0) {
                    $user-> email = $email;
                } else {
                    $array['error'] = 'Email já existe...';
                    return $array;
                }
            }
        }

        if($birthdate) {        // verificando se foi enviado alguma 'data de nasçimento'
            if(strtotime($birthdate) === false) {
                $array['error'] = 'Data de nasçimento invalida...';
            }

            $user-> birthdate = $birthdate;
        }

        if($city) {
            $user-> city = $city;
        }

        if($work) {
            $user-> work = $work;
        }

        if($password && $password_confirm) {
            if($password === $password_confirm) {
                $hash = paSsword_hash($password, PASSWORD_DEFAULT);     // gerando um hash da nova senha
                $user-> password = $hash;
            } else {
                $array['error'] = 'As senhas não batem...';
                return $array;
            }
        }

        $user-> save();

        return $array;
    }

    public function updateAvatar(Request $request) {
        $array['error'] = '';
        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];       // tipos de imagens que será permitido

        $image = $request-> file('avatar');     // pegando a imagem

        if($image) {
            if(in_array($image-> getClientMimeType(), $allowedTypes)) {     // 'getClientMimeType' função que pega o 'MimeType' do arquivo
                $filename = md5(time(). rand(0, 9999)). 'jpd';      // gerando nome aleatório 

                $destPath =public_path('/media/avatars');        // 'destPath' arquivo de destino

                $img = Image::make($image-> path())     // criando a imagem
                -> fit(200, 200)
                -> save($destPath. '/'. $filename);

            $user = User::find($this-> loggedUser['id']);       // salvando no banco de dados
            $user-> avatar = $filename;     // alteração do 'avatar'
            $user-> save();

            $array['url'] = url('/media/avatars/'. $filename);

            } else {
                $array['error'] = 'Arquivo não suportado...';
                return $array;
            }                
        } else {
            $array['error'] = 'Arquivo não enviado...';
            return $array;
        }        
        
        return $array;
    }

    public function updateCover(Request $request) {
        $array['error'] = '';
        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];

        $image = $request-> file('cover');

        if($image) {
            if(in_array($image-> getClientMimeType(), $allowedTypes)) {
                $filename = md5(time(). rand(0, 9999)). 'jpd';

                $destPath =public_path('/media/covers');

                $img = Image::make($image-> path())
                -> fit(850, 310)
                -> save($destPath. '/'. $filename);

            $user = User::find($this-> loggedUser['id']);
            $user-> cover = $filename;     // alteração o campo 'cover'
            $user-> save();

            $array['url'] = url('/media/covers/'. $filename);

            } else {
                $array['error'] = 'Arquivo não suportado...';
                return $array;
            }                
        } else {
            $array['error'] = 'Arquivo não enviado...';
            return $array;
        }        
        
        return $array;
    }

    public function read($id = false) {     // parametro opçional
        $array = ['erro'=> ''];

        if($id) {
            $info = User::find($id);        // pegando informações do usuário
            if(!$info) {
                $array['error'] = 'Usuario inexitente' ;
                return $array;
            }
        } else {
            $info = $this-> loggedUser;
        }

        $info['avatar'] = url('media/avatars/'. $info['avatar']);
        $info['cover'] = url('media/covers/'. $info['cover']);

        $info['me'] = ($info['id'] == $this-> loggedUser['id']) ? true : false;     // verificando se as informações são minhas

        $dateFrom = new \DateTime($info['birthdate']);
        $dateTo = new \DateTime('today');
        $info['age'] = $dateFrom-> diff($dateTo)-> y;       // calculando a quantidade de anos

        $info['followers'] = UserRelation::where('user_to', $info['id'])-> count(); // pegando a quantidade de seguidores
        $info['followers'] = UserRelation::where('user_from', $info['id'])-> count(); // pegando a quantidade de seguidores que sigo

        $info['photoCount'] = Post::where('id_user', $info['id'])       // pegando meus 'posts'
        -> where('type', 'photo')       // quando 'type' for igual a 'photos'
        -> count();

        $hasRelation = UserRelation::where('user_from', $this-> loggedUser['id'])       // pegando a informação de pessoas que eu sigo
        -> where('user_to', $info['id'])
        -> count();
        $info['isFollowing'] = ($hasRelation > 0) ? true:false;

        $array['data'] = $info;

        $array['data'] = $info;     // preenchendo o array com informações do usuário que eu mandar ou com informações do meu próprio usuário

        return $array;
    }
}
