import express from 'express';          // importando a biblioteca express

const server = express();       // instaçiando a função express

server.get('/', (req, res)=> {
    let tecnologia: string = "Node.js";
    let ano: number = 2024;
    res.send(`Estou codificando ${tecnologia} no ano de ${ano}`);
});

server.listen(3000, ()=> {      // definindo a porta de execução
    console.log('Servidor rodando no link: http://localhost:3000/');
});