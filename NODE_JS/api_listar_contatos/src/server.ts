import express from 'express';      // importando bibliotecas
import helmet from 'helmet';
import router from './routes';

const server = express();       // 'iniçializando' o servidor

server.use(helmet());
server.use(express.json());     // utilizando o 'json' como comunicação padrão do servidor
server.use(express.urlencoded({ extended: true }));

server.use('/', router);

server.listen(3000, ()=> {
    console.log('Servidor rodando: http://http:localhost:3000/');
});