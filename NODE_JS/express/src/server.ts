import {createServer} from 'node:http';

const server = createServer((req, res)=> {
    let nome: string = "Luis Henrique S F";
    let profissao: string = "FullStack";
    res.end(`Me chamo ${nome} e sou um profissional ${profissao}`);
});

server.listen(3000, ()=> {
    console.log('Servidor rodando em http://localhost:3000');
});