import express from 'express';
import z from 'zod';
import { jsonplaceholderResponse } from './schemas/jsonplaceholderResponse';

const server = express();

server.use(express.json());
server.use(express.urlencoded({ extended: true }));

server.get('/ping', (req, res) => {
    res.json({ pong: true });
});

server.get('/posts', async (req, res) => {      // rota 'posts' requista a 'api' de terçeiros de posts
    const request = await fetch('https://jsonplaceholder.typicode.com/posts');
    const data = await request.json();      // dados da requisição

    const result = jsonplaceholderResponse.safeParse(data);
    if(!result.success) {       // verificando, validando a resposta da 'API'
        return res.status(500).json({ error: 'Ocorreu um erro interno' });
    }

    let totalPosts = result.data.length;        // processando 

    res.json({ total: totalPosts });        // retornando o resultado final
});

server.listen(3000, () => {
    console.log('Rodando: http://localhost:3000/');
});
