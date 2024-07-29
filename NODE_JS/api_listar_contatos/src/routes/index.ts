import express from 'express';
import { writeFile } from 'fs/promises';
import { readFile } from 'fs/promises';

const dataSource = './data/list.txt';       // variável de 'fonte dos dados'

const router = express.Router();

router.post('/contato', async (req, res)=> {      // rota 'contato' que irá inserir um novo contato
    const { name } = req.body;      // pegando o 'name' do body

    if(!name || name.length < 2) {     // se caso 'name' não existir ou for 'menor' que 2 dará erro
        return res.json({ error: 'Nome precisa ter pelo menos 2 catacters.' });     // 'return' dá a resposta e faz parar a execução
    }

    let list: string[] = [];        // variável 'list' armazenando um array de string
    try {
        const data = await readFile(dataSource, {encoding: 'utf8'});       // lendo o conteúdo do arquivo 'list.txt' que armazena os nomes
        list = data.split('\n');        // o array será criado com um item em cada linha
    } catch(err) {

    }
    
    list.push(name);        // inserindo um novo nome
    await writeFile(dataSource, list. join('\n'));
    
    res.status(201). json({ contato: name });       // indicando que deu tudo certo
});

router.get('/contatos', async (req, res)=> {        // rota para 'ler' os contatos inseridos
    
    let list: string[] = [];
    try {
        const data = await readFile(dataSource, {encoding: 'utf8'});
        list = data.split('\n');
    } catch(err) {
    
    }

    res.json({ contatos:list });        // retorna a lista de contatos

});

router.delete('/contato', async (req, res)=> {      // rota para deletar contatos
    const { name } = req.query;     // pegando o nome mandado

    if(!name) {     // verificação
        return res.json({ error: 'Precisa de um nome para excluir...' });
    }

    let list: string[] = [];
    try {
        const data = await readFile(dataSource, {encoding: 'utf8'});
        list = data.split('\n');
    } catch(err) {
    
    }

    list = list.filter(item=> item.toLowerCase() !== (name as string). toLowerCase());     // filtrando a lista para exclusão

    await writeFile(dataSource, list.join('\n'));     // escrevendo a lista depois das exclusões

    res.json({ contato:name });
});

export default router;