<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $posts = Post::all();       // buscando todos os 'posts'

        return $posts;      // listando todos 'posts'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // no futuro irár apenas exibir o formulário
        $new_post = [       // 'post' será incluido no banco de dados
            'title' => 'Crud Laravel',
            'content' => 'Framework PHP',
            'author' => 'Luis Henrique Silva Ferreira'
        ];

        $post = new Post();

        $post-> title = 'Segundo POst';
        $post-> content = 'Programador FullStack';
        $post-> author = 'Luis Henrique Silva Ferreira';
        $post-> save();

        return $post;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // reçebera um post com um novo recurso
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $post = new Post();

        $post = $post-> find($id);

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $posts = Post::find($id)-> update([
            'author'=> 'Luis Henrique S F'
        ]);
        
        return $posts;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $post = Post::find($id)-> delete();
        return $post;
    }
}
