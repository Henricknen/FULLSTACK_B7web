<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\PostLike as ModelsPostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRelation;
use App\PostComment;
use App\PostLike;
use App\User;


class FeedController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this-> middleware('auth:api');
        $this-> loggedUser = auth()-> user();
    }

    public function create(Request $request) {      // m
        $array['error'] = '';
        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];

        $type = $request-> input('type');       // pegando os dados que estão sendo enviados
        $body = $request-> input('body');
        $photo = $request-> file('photo');

        if($type) {

            switch($type) {
                case 'text':
                    if(!$body) {
                        $array['error'] = 'Texto não enviado...';
                        return $array;
                    }
                break;
                case 'photo':                    
                if($photo) {
                    if(in_array($photo-> getClientMimeType(), $allowedTypes)) {     // verificando foto
                        $filename = md5(time(). rand(0, 9999)). 'jpd';

                        $destPath = public_path('/media/uploads');      // pasta de destino

                        $img = Image::make($photo-> path())
                        -> resize(800, null, function($contranint) {        // tratamento da imagem
                            $contranint-> aspectRatio();
                        })
                        -> save($destPath. '/'. $filename);

                        $body-> $filename;
                    } else {
                        $array['error'] = 'Arquivo não suportado...';
                        return $array;
                    }
                } else {
                    $array['error'] = 'Arquivo não enviado...';
                    return $array;
                }
                break;
                default:
                    $array['error'] = 'Tipo de postagem inexistente...';
                    return $array;
                    break;
            }

            if($body) {
                $newPost = new Post();      // criando o 'post'
                $newPost-> id_user = $this-> loggedUser['id'];     // preenchendo os dados do 'post'
                $newPost-> type = $type;
                $newPost-> created_at = date('Y-m-d H:i:s');
                $newPost-> body = $body;
                $newPost-> save();
            }

        } else {
            $array['error'] = 'Dados não enviados...';
            return $array;
        }

        return $array;
    }

    public function read(Request $request) {
        $array = ['error'=> ''];

        $page = intval($request-> input('page'));
        $perPage = 2;       // quantidade de páginas 

                 // pegando 'lista' de usuários que sigo;
        $users = [];
        $userList = UserRelation::where('user_from', $this-> loggedUser['id']);     // pegando todos registros que eu 'segui'
        foreach($userList as $userItem) {
            $users[] = $userItem['user_to'];        // ultilizando 'foreach' para pegar todos que sigo e jogar dentro 'users'
        }
        $users[] = $this-> loggedUser['id'];

             // pegando 'post' dos usuário que sigo
        $postList = Post::whereIn('id_user', $users)
        -> orderBy('created_at', 'desc')
        -> offset($page * $perPage)
        -> limit($perPage)      // quantidade de itens que será pego
        -> get();

        $total = Post::whereIn('id_user', $users)-> count();        // total de 'post' que tem
        $pageCount = ceil($total / $perPage);

             // preencher as informaçõe adiçionais
        $posts = $this-> _postToObject($postList, $this-> loggedUser['id']);

        $array['posts'] = $posts;
        $array['pageCount'] = $pageCount;
        $array['currentPage'] = $page;

        return $array;
    }

    public function userFeed(Request $reques, $id = false) {
        $array = ['error'=> ''];

        if($id == false) {
            $id = $this-> loggedUser['id'];
        }

        $page = intval($request-> input('page'));
        $perPage = 2;

        $postList = Post::where('id_user', $id)     // pegando os post do usuário ordenado pela data
        -> orderBy('created_at', 'desc')
        -> offset($page * $perPage)
        -> limit($perPage)
        -> get();

        $total = Post::where('id_user', $id)-> count();
        $pageCount = ceil($total / $perPage);

        $posts = $this-> _postToObject($postList, $this-> loggedUser['id']);

        $array['posts'] = $posts;
        $array['pageCount'] = $pageCount;
        $array['currentPage'] = $page;

        return $array;
    }

    private function _postListToObject($postList, $loggedId) {
        foreach($postList as $postKey => $postItem) {
            if($postItem['id_user'] == $loggedId) {     // verificando se o 'post' é meu
                $postList[$postKey]['mine'] = true;
            } else {
                $postList[$postKey]['mine'] = false;
            }

            $userInfo = User::find($postItem['id_user']);       // preenchendo informações do usuário
            $userInfo['avatar'] = url('media/avatars/'. $userInfo['avatar']);
            $userInfo['cover'] = url('media/covers/'. $userInfo['cover']);
            $postList[$postKey]['user'] = $userInfo;

            $likes = PostLike::where('id_post', $postItem['id'])-> count();
            $postList[$postKey]['likeCount'] = $likes;

            $isLiked = PostLike::where('id_post', $postItem['id'])
            -> where('id_user', $loggedId)
            -> count();
            $postList[$postKey]['liked'] = ($isLiked > 0) ? true: false;

            $comments = PostComment::where('id_post', $postItem['id'])-> get();     //preenchendo informaçõe dos comentarios
            foreach($comments as $commentKey=> $comment) {
                $user = User::find($comment['id_user']);
                $user['avatar'] = url('media/avatars/'. $user['avatar']);
                $user['cover'] = url('media/covers/'. $user['cover']);
                $comments[$commentKey]['user'] = $user;
            }
            $postList[$postKey]['comments'] = $comments;

        }
     
        
        return $postList;
    }
}
