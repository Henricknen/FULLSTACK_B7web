// Seleciona o elemento HTML com id 'numero1' e atribui à variável numero1
let numero1 = document.getElementById('numero1');
let numero2 = document.getElementById('numero2');       // seleciona o elemento HTML com id 'numero2' e atribui à variável numero2
let botao = document.getElementById('calcular');
let res = document.getElementById('resultado');

function calcular(n1, n2) {     // função 'calcular' que recebe dois parâmetros n1 e n2
    if(typeof n1 == 'number' && typeof n2 == 'number') {        // verificando se n1 e n2 são do tipo 'number'
        return n1 + n2;
    } else {
        n1 = parseInt(n1);      // se não forem números, converte n1 e n2 para números inteiros usando parseInt
        n2 = parseInt(n2);
        return n1 + n2;
    }
}

botao.addEventListener('click', function() {
    res.innerHTML = calcular(numero1.value, numero2.value);
});
