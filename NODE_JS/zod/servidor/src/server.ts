import express from 'express';

const server = express();

server.use(express.json());
server.use(express.urlencoded({ extended: true }));

server.get('/ping', (req, res) => {     // rota 'ping'
    res.json({ pong: true });       // retorna 'pong true'
});

server.listen(3000, () => {     // servidor rodará na porta 3000
    console.log('Rodando: http://localhost:3000/');
});
