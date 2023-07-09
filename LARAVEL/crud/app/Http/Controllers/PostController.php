<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class PostController extends Controller {
    public function Create(Request $request) {      // método 'create'
        $new_post = [       // 'post' será incluido no banco de dados
            'title' => 'Crud Laravel',
            'content' => 'Framework PHP',
            'author' => 'Luis Henrique Silva Ferreira'
        ];

                // forma mais convençional de criar um registro no banco de dados
        // $post = new Post($new_post);        // instançiando o model 'Post'
        // $post-> save();     // 'save' salva os dados no banco de dados

        $post = new Post();

        $post-> title = 'Segundo POst';
        $post-> content = 'Programador FullStack';
        $post-> author = 'Luis Henrique Silva Ferreira';
        $post-> save();

        dd($post);
    }
}
