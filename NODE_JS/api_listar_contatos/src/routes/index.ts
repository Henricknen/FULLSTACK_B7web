import express from 'express';
import { createContact, deleteContact, getContacts } from '../services/contact';

const router = express.Router();

router.post('/contato', async (req, res)=> {      // rota 'contato' que irá inserir um novo contato
    const { name } = req.body;      // pegando o 'name' do body

    if(!name || name.length < 2) {     // se caso 'name' não existir ou for 'menor' que 2 dará erro
        return res.json({ error: 'Nome precisa ter pelo menos 2 catacters.' });     // 'return' dá a resposta e faz parar a execução
    }

    await createContact(name);      // utilizando função que cria contatos
    
    res.status(201). json({ contato: name });       // indicando que deu tudo certo
});

router.get('/contatos', async (req, res)=> {        // rota para 'ler' os contatos inseridos
    let list = await getContacts();

    res.json({ contatos:list });        // retorna a lista de contatos

});

router.delete('/contato', async (req, res)=> {      // rota para deletar contatos
    const { name } = req.query;     // pegando o nome mandado

    if(!name) {     // verificação
        return res.json({ error: 'Precisa de um nome para excluir...' });
    }

    await deleteContact(name as string); 

    res.json({ contato:name });
});

export default router;