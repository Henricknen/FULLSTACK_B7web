import express from 'express';

const router = express.Router();

router.get('/', (req, res)=> {
    res.json({ produtos: [] });
});

router.post('/', (req, res)=> {
    console.log('PARAMS', req.params);          // reçebendo 'parâmetros'
    console.log('QUERY', req.query);        // reçebendo 'query'
    console.log('BODY', req.body);      // reçebendo 'dados do corpo' da requisição
    
    res.json({ produtos: [] });
});

router.get('/:id', (req, res)=> {
    const { id } = req.params;

    res.json({ id, name: 'Computador', price: 5000 });
});

export default router;