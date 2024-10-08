import express from 'express';          // importando a biblioteca express
import helmet from 'helmet';
import path from 'path';

const server = express();       // iniçialização do servidor

server.use(helmet());       // configuração 'use' é uma função do express que permite inserir coisas
server.use(express.json());         // configurando o cabeçalho de resposta para avisar que a resposta está em 'Json'
server.use(express.urlencoded({ extended: true }));     // configuração que lida com os dados de 'requisição'
server.use(express.static(path.join(__dirname, '../public')));      // configuração pasta 'public' para armazenar aquivos acessiveis e estáticos

server.get('/ping', (req, res)=> {      // criando uma rota chamada 'ping'
    res.json({ pong: true });       // rota retorna 'pong'
});

server.get('/produtos', (req, res)=> {
    res.json({ produtos: [] }); 
});

server.get('/produtos/:id', (req, res)=> {      // ':id' transforma a rota em dinâmica
    console.log(req.params);        // 'params' é um objeto onde ficara armazenado o parâmetro

    res.json({ name: 'Teclado ADFD', price: 100 }); 
});

server.get('/voos/:from/:to', (req, res)=> {
    res.json({ flight: { from: "X", to: "Y", price: 4564878 } });
});

server.get('/', (req, res)=> {
    let tecnologia = "Node.js";
    let ano = 2024;

    res.json({ tecnologia, ano });
});

server.listen(3000, ()=> {      // definindo a porta de execução
    console.log('Servidor rodando no link: http://localhost:3000/');
});