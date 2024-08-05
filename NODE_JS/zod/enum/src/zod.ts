import { z } from 'zod';

const pattern = z.object({
    fuel: z.enum(['Gasoline', 'Etanol', 'Diesel'])      // 'enum' é basicamente um array de opções de combustíveis
});

const result = pattern.parse({
    fuel: 'Gasoline'
});

console.log(result);
