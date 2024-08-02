import z from 'zod';

const pattern = z.object({      // variável 'pattern' reçebendo um objeto com valores aleátorios
    name: z.string(),      
    age: z.number(),
    active: z.boolean(),        // type valida se é 'true' ou 'false'
    birthDate: z.date(),            // type valida se é uma 'data'
    qualquer: z.any(),      // type açeita a validação de 'qualquer coisa'
    nunca: z.never(),           // type 'não aceita nenhum' valor
});

const result = pattern.parse({
    name: 'Luis Henrique S. F.',
});

console.log(result);