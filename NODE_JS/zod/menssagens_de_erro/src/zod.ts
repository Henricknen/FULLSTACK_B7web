import { z } from 'zod';

const pattern = z.object({
    idade: z.number({
        required_error: 'A idade é obrigatória...',     // menssagem quando este item espeçifo não reçeber nada
        invalid_type_error: 'Idade precisa ser um número...'        // menssagem quando o 'type' for diferento do
    }).gte(18, { message: 'Precisa ser maior de idade...' })    // menssagem será impressa quando a válidação de 'gte' não funçionar
});

try {
    const result = pattern.parse({
        idade: 15
    });

    console.log(result);
} catch (e) {
    console.error(e.errors);
}
