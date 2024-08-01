import z from 'zod';

const schema = z.object({
    name: z.string().min(4),        // padrão
    email: z.string().email(),
    age: z.number().min(18).max(99),
    status: z.boolean(),
    caracteristicas: z.array(
        z.object({        // dentro de 'caracteristicas' tem um objeto com caracteristicas
        pos: z.string(),
        ano: z.number()
    })
    )
});

type User = z.infer<typeof schema>;     // fazendo a 'inferençia' utilizando o proprío zod

let data:User = {       // dados utilizando a 'inferençia' User
    name: "Luis Henrique S. F.",
    email: "l.henrick@live.com",
    age: 99,
    status: true,
    caracteristicas: [
        { pos: 'Desenvolvimento Web', ano: 2024 },
    ]
}

const resultt = schema.safeParse(data);
console.log(resultt);
