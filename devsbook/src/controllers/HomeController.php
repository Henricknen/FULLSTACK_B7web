<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    private $loggedUser;        // propriedade '$loggedUser' armazena o usuário que está logado

    public function __construct() {     // contrutor é executado quando uma classe é instançiada (começa a ser rodada), é executado antes de qualquer coisa
        $this->redirect('/login');         // redireçionado para 'login' sem faze qualquer verificação
    }

    public function index() {
        $this->render('home', ['nome' => 'Luis Henrique S F']);
    }
}