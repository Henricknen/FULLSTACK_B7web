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

    public function edit($args) {
        $usuario = Usuario :: select()-> find($args['id']);      // pegando informações de um usuario espeçifico


        $this->render('edit', [
            'usuario' => $usuario
        ]);
    }

    public function editAction($args) {
        $name = filter_input(INPUT_POST, 'name');       // reçebendo os dados
        $email = filter_input(INPUT_POST, 'email');

        if($name && $email) {
            Usuario:: update()
                ->set('nome', $name)
                ->set('email', $email)
                ->set('id', $args['id'])
            ->execute();
            $this-> redirect('/');
        }

        $this-> redirect('/usuario/'. $args['id']. '/editar');
    }

    public function del($args) {

    }

}