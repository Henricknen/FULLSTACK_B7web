<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    private $loggedUser;        // propriedade armazena um usuário que está logado

    public function __construct() {     // contrutor é a primeira coisa a ser executada até mesmo antes do método que será acessado
        $this->redirect('/login');
    } 

    public function index() {
        $this->render('home', ['nome' => 'Luis henrique']);
    }

}