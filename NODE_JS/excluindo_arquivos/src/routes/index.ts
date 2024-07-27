import express, { RequestHandler } from 'express';          // arquivo de rota prinçipal
// import { interferir } from '../middlewares/interferir';
import produtosRouter from './produtos';
import voosRouter from './voos';

const router = express.Router();

// router.use(interferir);

router.use('/produtos', produtosRouter);
router.use('./voos', voosRouter);

router.get('/ping', (req, res)=> {
    console.log("EXECUTOU O PING");
    res.json({ pong: true });
});

router.get('/', (req, res)=> {
    console.log('PARAMS', req.params);          // madando 'parâmetros'
    console.log('QUERY', req.query);        // madando 'query'
    console.log('BODY', req.body);      // madando 'dados do corpo' da requisição
    
    let tecnologia: string = "Node.js";
    let ano: number = 2024;

    res.json({ tecnologia, ano });
});


export default router;