let somar = (x, y) => {        // '=>' se chama arrow
    return x + y;
} 

console.log(somar(10, 6));      // 'passando valores' para a função somar

// -----------------------------------------------------------------------------------------------------

let dividir = (x, y) => x / y;      // a ação 'x / y' na frente do '=>' arrow evita o uso do 'return'

console.log(dividir(100, 10));

// -----------------------------------------------------------------------------------------------------

let letras_nome = nome => nome.length;      // quando se tem apenas um parâmetro o parênteses '()' é opiçional

console.log(letras_nome('Luis Henrique S F'));