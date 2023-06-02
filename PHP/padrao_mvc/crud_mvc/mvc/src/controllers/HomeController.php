<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    public function index() {       // método 'index'
        $posts = [
            ['titulo'=> 'Titulo de teste 1', 'corpo'=> 'Corpo de teste 1'],
            ['titulo'=> 'Titulo de teste 2', 'corpo'=> 'Corpo de teste 2'],
            ['titulo'=> 'Titulo de teste 3', 'corpo'=> 'Corpo de teste 3'],
            ['titulo'=> 'Titulo de teste 4', 'corpo'=> 'Corpo de teste 4'],
            ['titulo'=> 'Titulo de teste 5', 'corpo'=> 'Corpo de teste 5'],
        ];

        $this->render('home', [     // 'render' redenriza e carrega um view 'home' que está dentro daos parentezes
            // 'nome'=> $nome,      // mandando variável '$nome' para a view
            'idade'=> 31,
            'posts'=> $posts
        ]); 
    }

    public function fotos() {
        $this->render('fotos');
    }

    public function foto($parametros) {
        echo "Acessando a foto: ". $parametros['id'];
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}