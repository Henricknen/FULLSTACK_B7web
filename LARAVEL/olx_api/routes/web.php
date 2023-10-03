<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function (): JsonResponse {     // 'JsonResponse' é o tipo da resposta que será retornado
    return response()-> json(['Pong'=> true]);
});


/*
Rota de Utilidade
    [x] - /ping - responde com pong

Rotas de autenticação * Autenticação via TOKEN
    [ ] - /user/signin -- Login
    [ ] - /user/signup -- Registro do usuario
    [ ] - /user/me -- Informações do usuário logado

Rotas de configuração geral
    [ ] - /states - Listar os estados
    [ ] - /categories - Listar as categorias do sistemas

Rotas de Advertises
    [ ] - ad/list - Listar todos os anúnçios
    [ ] - ad/:id - Dados de um anúnçio único
    [ ] - ad/add - Adiçionar um novo anúnçio
    [ ] - ad/:id(PUT) - Alterar um anúnçio publicado
    [ ] - ad/:id(delete) - Delete um anúnçio
    [ ] - ad/:image - Deletar a imagem de um anúnçio

*/