<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class PostController extends Controller {
    public function create(Request $request) {      // método 'create'
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

    public function read(Request $r) {     // fazendo a leitura do banco de dados
        $post = new Post();     // instançiando 'model' post

        // $posts = $post-> all();     // método 'all' pega todos os posts cadastrados no banco de dados
        // $posts = $post-> where('id', '=', 1);       // ultilizando condição 'where' para ler um post espeçifico
        $post = $post-> find(1);       // ultilizando método 'find' para pegar a chave primaria que é definida na tabela posts que é o 'id'

        return $post;
    }

    public function all(Request $r) {       // método 'all'
        $posts = Post::all();       // chamando diretamente todos 'posts'

        return $posts;
    }

    public function update(Request $request) {
        // $post = Post::find(2);      // atualiza 'post' de id 2
        // $post-> title = 'Uma vez que tem este registro, ele pode ser modificado';        // 'title' será atualizada
        // $post -> save();    # atualizando o registro no banco de dados

        $posts = Post::where('id', '>', 0)-> update([          // atualizando mais de um 'post'
            'author'=> 'Luis Henrique S F'
        ]);
        
        return $posts;
    }

    public function delete(Request $request) {      // métod 'delete' apaga um registro do banco de dados
        // $post= Post::find(1);       // seleçionando o registro que será apagado

        // if($post) {
        //     return $post-> delete();       // deletando
        // }

        // return 'Não existe post com este id';

        $post = Post::where('id', '>', 0)-> delete();     // faz a exclusão em massa deletando todos os registros do banco de dados
    }
}
