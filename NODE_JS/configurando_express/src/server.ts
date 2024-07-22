import express from 'express';          // importando a biblioteca express
import helmet from 'helmet';
import path from 'path';

const server = express();       // iniçialização do servidor

server.use(helmet());       // configuração 'use' é uma função do express que permite inserir coisas
server.use(express.json());         // configurando o cabeçalho de resposta para avisar que a resposta está em 'Json'
server.use(express.urlencoded({ extended: true }));     // configuração que lida com os dados de 'requisição'
server.use(express.static(path.join(__dirname, '../public')));      // configuração pasta 'public' para armazenar aquivos acessiveis e estáticos

server.get('/', (req, res)=> {
    let tecnologia: string = "Node.js";
    let ano: number = 2024;

    res.json({ tecnologia, ano });
});

server.listen(3000, ()=> {      // definindo a porta de execução
    console.log('Servidor rodando no link: http://localhost:3000/');
});