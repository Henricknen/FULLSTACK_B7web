import z from 'zod';

export const jsonplaceholderResponse = z.array(     // um array de objetos será o padrão que será recebido da 'API' de terçeiro
    z.object({      // padrão de respostas
        userId: z.number(),
        id: z.number(),
        title: z.string(),
        body: z.string(),
    })
);