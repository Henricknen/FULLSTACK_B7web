import { ErrorRequestHandler, RequestHandler } from "express";

export const notFoundRequest: RequestHandler = (req, res)=> {       // funçao de 'não encontrado' que lida com uma requisição
    res.status(404). json({error: '[[ERROR]] Rota não encotrada...'})
}

export const errorHandler: ErrorRequestHandler = (err, req, res, next) => {
    console.log(err);       // mostra todos os detalhes sobre o erro
    res.status(404). json({error: '[[ERROR]] Ocorreu um erro ...'})    
}