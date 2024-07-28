import express from 'express';

const router = express.Router();

router.post('/contato', (req, res)=> {      // rota 'contato' que irá inserir um novo contato
    const { name } = req.body;      // pegando o 'name' do body

    if(!name || name.length < 2) {     // se caso 'name' não existir ou for 'menor' que 2 dará erro
        return res.json({ error: 'Nome precisa ter pelo menos 2 catacters.' });     // 'return' dá a resposta e faz parar a execução
    }

    res.status(201). json({ contato: name });       // indicando que deu tudo certo
});

export default router;