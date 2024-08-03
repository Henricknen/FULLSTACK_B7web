import z from 'zod';

const pattern = z.object({      // objeto com propriedades 'name' e 'age'
    name: z.string(),
    age: z.number(). optional()     // método 'optional' transforma propriedade age opçional
});

const result = pattern.parse({
    name: 'Luis Henrique S. F.',
    age: 100        // forneçendo ou não forneçendo estará correto
});

console.log(result);