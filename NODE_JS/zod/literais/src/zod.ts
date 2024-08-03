import { z } from 'zod';

const pattern = z.object({
    backend: z.literal('NodeJs'),       // propriedade backend espera reçeber um valor 'literal' 'NodeJs'
});

const result = pattern.parse({
    backend: 'VueJs',       // enviando o valor 'VueJs' para a proprieda que espera 'NodeJs', fazendo assim ocasionar um erro no console
});

console.log(result);
