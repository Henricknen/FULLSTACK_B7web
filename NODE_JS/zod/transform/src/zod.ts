import { z } from 'zod';

const pattern = z.object({
    name: z.string().transform(val => val.toUpperCase()),       // 'transform' retorna name e caracteres maiúsculos 
    email: z.string().email().transform((val) => {      // 'val' é email válidado
        return val.split('@')[1];       // 'split' transforma val em um array e pega o valor depois do '@'
    })
});

const result = pattern.parse({
    name: 'luis henrique s f',
    email: 'l.henrick@live.com'
});

console.log(result);