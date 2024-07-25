import express, { RequestHandler } from 'express';          // arquivo de rota prinçipal
import { interferir } from '../middlewares/interferir';
import produtosRouter from './produtos';
import voosRouter from './voos';

const router = express.Router();

router.use(interferir);     // em todas as requisições o 'middleware' será executado primeiro

router.use('/produtos', produtosRouter);
router.use('./voos', voosRouter);

router.get('/ping', (req, res)=> {      // inserindo midleware 'interferir' na rota /ping
    console.log("EXECUTOU O PING");
    res.json({ pong: true });
});

router.get('/', (req, res)=> {
    let tecnologia: string = "Node.js";
    let ano: number = 2024;

    res.json({ tecnologia, ano });
});


export default router;