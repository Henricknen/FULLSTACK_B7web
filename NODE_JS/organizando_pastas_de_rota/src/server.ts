import express from 'express';          // importando a biblioteca express
import helmet from 'helmet';
import path from 'path';
import router from './routes';
import produtosRouter from './routes/produtos';
import voosRouter from './routes/voos'

const server = express();       // iniçialização do servidor

server.use(helmet());       // configuração 'use' é uma função do express que permite inserir coisas
server.use(express.json());         // configurando o cabeçalho de resposta para avisar que a resposta está em 'Json'
server.use(express.urlencoded({ extended: true }));     // configuração que lida com os dados de 'requisição'
server.use(express.static(path.join(__dirname, '../public')));      // configuração pasta 'public' para armazenar aquivos acessiveis e estáticos

server.use('/produtos', produtosRouter);        // todos os itens que tiver '/produtos' na url será redireçionado para 'produtosRouter'
server.use('/voos', voosRouter);
server.use('/', router);            // indica que no acesso iniçial '/' estarei utilizando 'router'

server.listen(3000, ()=> {      // definindo a porta de execução
    console.log('Servidor rodando no link: http://localhost:3000/');
});