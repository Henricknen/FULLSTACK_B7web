<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
