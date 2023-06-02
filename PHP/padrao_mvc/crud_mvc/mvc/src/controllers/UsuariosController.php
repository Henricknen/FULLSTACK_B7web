<?php
namespace src\controllers;

use \core\Controller;

class UsuariosController extends Controller {

    public function add() {       // método 'index'
        $this-> render('add');
    }
     
    public function addAcrion() {
        echo "Reçebido";
    }

}