<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;        // puchando model 'Usuario'

class HomeController extends Controller {

    public function index() {       // método 'index'
               $usuarios = Usuario :: select()-> execute();     // pegando a lista de usuarios
               $this->render('home', [
                'usuarios' => $usuarios     // mando lista de usuario para a 'view'
               ]);
    }
}