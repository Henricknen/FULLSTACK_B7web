import express from 'express';          // arquivo de rota prinçipal
import produtosRouter from './produtos';
import voosRouter from './voos';

const router = express.Router();

router.use('/produtos', produtosRouter);
router.use('./voos', voosRouter);

router.get('/ping', (req, res)=> {
    res.json({ pong: true });
});

router.get('/', (req, res)=> {
    let tecnologia: string = "Node.js";
    let ano: number = 2024;

    res.json({ tecnologia, ano });
});


export default router;