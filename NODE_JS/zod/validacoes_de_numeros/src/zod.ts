import { z } from 'zod';

const pattern = z.object({
    positivo: z.number().gt(0),     // tanto 'positive' quanto 'gt' defini números positivos indicando que tem que ser maior que 0
    iclusao_numeros: z.number().nonnegative(),        // 'nonnegative' indica que o númeor é 0 ou maior não sendo negativo
    idade: z.number().gte(18),      // 'gte' define 'idade' como maior ou igual a 18
    inteiro: z.number().int()
});

const result = pattern.parse({
    positivo: 19,
    idade: 18,
    inteiro: 5,
    iclusao_numeros: 0
});

console.log(result);
