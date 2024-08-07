import express from 'express';
import z from 'zod';

const server = express();

server.use(express.json());
server.use(express.urlencoded({ extended: true }));

server.get('/ping', (req, res) => {
    res.json({ pong: true });
});

server.post('/user', (req, res) => {        // user utilizando 'post' para inserir dados
    const userSchema = z.object({       // objeto dentro de um esquema 'userSchema' para pegar os dados do usúario
        name: z.string().min(2),
        email: z.string().email(),
        age: z.number().min(18).max(100)
    });

    const result = userSchema.safeParse(req.body);      // mandando o 'body' da requisição para o esquema que verificará se os dados estão no padrão do 'userSchema'
    if(!result.success) {
        return res.json({ error: 'Dados inválidos...' });// impedindo a execução
    }

    const { name, email, age } = result.data;

    console.log('Processando...');      // processando os dados reçebidos
    console.log(name, email, age);

    res.status(201).json({ result: 'tudo ok' });        // devolvendo os dados
});

server.listen(3000, () => {
    console.log('Rodando: http://localhost:3000/');
});
