import { z } from 'zod';


const pattern = z.promise(z.object({        // definindo uma promessa contendo um objeto
    age: z.number()
}));

const apiResponse = Promise.resolve({       // simula uma resposta de API como uma promessa resolvida
    age: 100
});

const result = pattern.parse(apiResponse);      // valida e faz o parse da resposta da API de acordo com o padrão
console.log(result);