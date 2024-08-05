import { z } from 'zod';

const pattern = z.object({
    age: z.union([z.string(), z.number()])      // age utilizando 'union' e pode reçeber tanto string como number
});

const result = pattern.parse({
    // age: 'string'
    age: 100
});

console.log(result);