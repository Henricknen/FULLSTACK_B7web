/*
m2 = 3000, se tiver 1 quarto o m2 é 1x, 2 quartos o m2 é 1.2 x se 3 o m2 é 1.5x
*/

function calcularImovel(metragem, quartos) {
    let m2 = 3000;
    let preco = 0;

    switch(quartos) {
        case 1:     // quantidade de quartos
        default:
            preco = metragem * m2;
            break;

        case 2:
            preco = metragem * (m2 * 1.2);      //  (m2 * 1.2) é o calculo de dois quartos
            break;

        case 3:
            preco = metragem * (m2 * 1.5);      // (m2 * 1.5) calculo de três quartos
            break;

    }
    return preco;
}

let metragem = 123;     // o imovél tem 123 m2
let quartos = 3;        // e 3 quartos
let preco = calcularImovel(metragem, quartos);
console.log(`A casa custa R$: ${preco}`);