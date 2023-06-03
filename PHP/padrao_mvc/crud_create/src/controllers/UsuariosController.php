<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class UsuariosController extends Controller {

    public function add() {       
        $this->render('add');
    }
     
    public function addAction() {
        $name = filter_input(INPUT_POST, 'name');       // reçebendo os dados
        $email = filter_input(INPUT_POST, 'email');

        if($name && $email) {       // verificando se '$name' e '$email' existe no bancco de dados
            $data = Usuario:: select()-> where('email', $email)-> execute();        // procura na tabela de usuarios quem tem o email igual ao '$email'

            if(count($data) === 0) {        // se não achar usuario
                Usuario:: insert([    // inserindo usuario
                    'nome' => $name,
                    'email' => $email
                ])-> execute();
                $this-> redirect('/');
            }
        }

        $this-> redirect('/novo');
    }

}