let numero1 = document.getElementById('numero1') as HTMLInputElement;
let numero2 = document.getElementById('numero2') as HTMLInputElement;
let botao = document.getElementById('calcular');
let res = document.getElementById('resultado');

function calcular(n1: number, n2: string) {     // inserindo 'string' no lugar de number para simular um erro
    return n1 + n2;
}

botao.addEventListener('click', function() {
    res.innerHTML = calcular(+numero1.value, +numero2.value). toString();
});
