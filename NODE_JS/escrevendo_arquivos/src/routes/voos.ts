import express from 'express';

const router = express.Router();

router.get('/:from/:to', (req, res)=> {
    console.log('PARAMS', req.params);
    console.log('QUERY', req.query);
    console.log('BODY', req.body);

    const { from, to } = req.params;

    res.json({
        flight: {
            from: from.toUpperCase(),
            to: to.toUpperCase(),
            price: 456487
        }
    });
    
});

export default router;