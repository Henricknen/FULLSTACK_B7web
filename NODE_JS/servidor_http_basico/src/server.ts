import { createServer } from 'node:http';       // importando a função 'createServer' do http que criará um servidor

const server = createServer((req, res)=> {         // variável 'server' que armazena a função 'createServer' executa uma arrow function com parâmetros de dados da 'requisição' e dados de 'resposta'
    res.end("Programador FullStack");       // utilizando 'res' de resposta e a função 'end' para fazer a finalização mostrando um texto
});

server.listen(3000, ()=> {        // fazendo o servidor 'server' se atrelar com uma porta espeçifica '3000' do computador
    console.log('Servidor funçionando em http://localhost:3000');
});