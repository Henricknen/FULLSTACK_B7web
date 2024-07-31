import z from 'zod';        // importando a biblioteca 'zod'

const schema = z.string().min(3);      // padrão 'schema' reçebendo um dado 'string' com pelo menos 3 caracteres

let data = "NodeJS";       // 'dado' com uma 'string'

// ---------------------------------------------------------------------------------

const schemaa = z.object({      // reçebendo um objeto
    name: z.string().min(4),        // padrão
    email: z.string().email(),
    age: z.number().min(18).max(99)
});

let dataa = {       // objeto com 'dataa' com os dados que bateram com o padrão
    name: "Luis Henrique S. F.",
    email: "l.henrick@live.com",
    age: 99
}