import { z } from 'zod';

const pattern = z.object({
    name: z.string(),
    email: z.string().email(),
    training: z.array(z.string())       // 'training' é um array com minha formação
});

const result = pattern.parse({
    name: 'luis henrique s f',
    email: 'l.henrick@live.com',
    training: ['pós - Desenvolvimento web', 'graduação - Análise e desenvolvimento de Sistemas', 'tecnólogo - Informática para internet', 'curso - Front End']
});

console.log(result);