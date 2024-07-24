import express from 'express';

const router = express.Router();

router.get('/ping', (req, res)=> {
    res.json({ pong: true });
});

router.get('/', (req, res)=> {
    let tecnologia: string = "Node.js";
    let ano: number = 2024;

    res.json({ tecnologia, ano });
});


export default router;