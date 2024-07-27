import { RequestHandler } from "express";

export const interferir: RequestHandler = (req, res, next)=> {       // função 'interferir' será utilizada como 'middleware'
    let logged = false;     // variável 'logged' false ou seja usuário não está logado

    if(logged) {        // verificando se 'logged' for true 
        next();     // usário será logado
    } else {
        res.status(403).json({ error: "Middleware não permitiu..." })       // se não estiver logado retorna esse erro
    }
}