let cep = '19500';
console.log(cep.padEnd(8, '-'));        // função 'padend' tem dois parâmetros, 1º quantos é quantidade de caracteres da string e o 2º o que será inserido 'no final' da string caso não haja caracteres suficiente

// ----------------------------------------------------------------------------------

let cepp = '500-000';
console.log(cepp.padStart(8, '-'));     // função 'padstart' completa os caracteres iniçiais que faltarem

// ----------------------------------------------------------------------------------

let cartao = '1222415-5';       // número de cartão inexistente
let lastDigits = cartao.slice(-4);      // 'slice' pega apenas os últimos 4 intens da variável cartão
let cartao_mascarado = lastDigits.padStart(9, '*');     // cartao_mascarado tem que ter 9 caracteres, se faltar algum será preenchido com '*'

console.log('Seu cartão é esse? ' + cartao_mascarado);
