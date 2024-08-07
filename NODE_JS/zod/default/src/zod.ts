import { z } from 'zod';

const pattern = z.object({
    name: z.string(),
    email: z.string().email(),
    age: z.number().default(() => Math.floor(Math.random() * 18))     // age utilizando 'default' valor aleatório entre 0 e 18
});

const result = pattern.parse({
    name: 'luis henrique s f',
    email: 'l.henrick@live.com'
});

console.log(result);