let numero1 = document.getElementById('numero1') as HTMLInputElement;       // 'HTMLInputElement' faz o numero1 se comportar como um input do html
let numero2 = document.getElementById('numero2') as HTMLInputElement;
let botao = document.getElementById('calcular');
let res = document.getElementById('resultado');

function calcular(n1: number, n2: number) {     // ':number' indica que n1 e n2 é um número
    return n1 + n2;
}

botao.addEventListener('click', function() {
    res.innerHTML = calcular(+numero1.value, +numero2.value). toString();       // '+' converte 'numero1.value' e 'numero2.value' para número. 'toString' transforma 'resHTML' em uma string
});
