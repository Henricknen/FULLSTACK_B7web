import { z } from 'zod';

const pattern = z.object({
    name: z.string().toUpperCase(),      // name name será validado como 'string' e será transformado em 'maiúsculo'
    email: z.string().email().toLowerCase(),        // email além de string é espeçificada com 'email' e espeçificando com caracteres 'minúsculos'
    description: z.string().trim(),     // função 'trim' remove os espaços do iniçio e do final
    ano: z.number()
});

const result = pattern.parse({
    name: 'Luis Henrique S. F.',
    email: 'L.HENRICK@LIVE.COM',
    description: '       Tenho as seguintes formação: Pós em Desenvolvimento web, Graduação em Análise de desenvolvimento de sistemas, Técnico em Informática para internet e Eletroeletrônica          ',
    ano: 2024
});

console.log(result);
