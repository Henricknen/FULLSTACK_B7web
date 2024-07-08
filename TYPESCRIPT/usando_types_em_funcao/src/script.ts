function firstLetterUpperCase(name: string): string {      // ': string' depois do parâmentro da função indica qual é o tipo do retorno
    let firstLetter = name.charAt(0).toUpperCase();
    return firstLetter + name.substring(1);
}

let nome = firstLetterUpperCase('luisHenrique');

function somar(n1: number, n2: number): number {        // o type ': number' depois do parâmentro iria concatenar os elementos reçebidas, mas o type ': number' depois dos parâmetros 'n1' e 'n2' exige que sejam numeros
    return n1 + n2;
}

let algo = somar(2000, 24);