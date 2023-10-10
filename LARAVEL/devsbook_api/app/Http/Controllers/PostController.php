<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this-> middleware('auth:api');

        $this-> loggedUser = auth()-> user();
    }

    public function like($id) {     // método like reçebe o 'id' da postagem como parâmetro
        $array = ['error'=> ''];

        $postExists = Post::find($id);
        if($postExists) {       // verificando se Post ' existe'
            $isLiked = PostLike::where('id_post', $id)
            -> where('id_user', $this-> loggedUser['id'])
            -> count();

            if($isLiked > 0) {      // verificando se ja foi dado 'like' neste Post
                $pl = PostLike::where('id_post', $id)       // encontrando o 'Post'
                -> where('id_user', $this-> loggedUser['id'])
                -> first();
                $pl-> delete();

                $array['isLiked'] = false;
            } else {
                $newPostLike = new PostLike();
                $newPostLike-> id_post = $id;
                $newPostLike-> id_user = $this-> loggedUser['id'];
                $newPostLike-> created_at = date('Y-m-d H:i:s');
                $newPostLike-> save();

                $array['isLiked'] =  true;
            }

            $array['isLiked'] = $isLiked;

            $likeCount = PostLike::where('id_post', $id)-> count();
            $array['likeCount'] = $likeCount;

        } else
            $array['error'] = 'Post não existe';
        return $array;
    }
}
