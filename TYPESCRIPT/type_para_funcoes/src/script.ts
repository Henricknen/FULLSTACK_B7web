type MathFunction = (n1: number, n2: number) => number;         // definição do tipo 'MathFunction' que representa uma função com dois parâmetros 'n1' e 'n2', ambos do tipo number, e retorna um valor do tipo number.

const somar: MathFunction = (n1, n2) => {       // constante 'somar' utilizando o type 'MathFunction', não sendo necessario 'especificar' o type de n1 e n2       
    return n1 + n2;     // o retorna será um 'number'     
}

const subtrair: MathFunction = (n1, n2) => {
    return n1 - n2;    
}

const multiplicar: MathFunction = (n1, n2) => {
    return n1 * n2;    
}

const dividir: MathFunction = (n1, n2) => {
    return n1 / n2;
}
