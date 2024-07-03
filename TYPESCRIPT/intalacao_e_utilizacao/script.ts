let numero1 = document.getElementById('numero1') as HTMLInputElement;       // 'HTMLInputElement' faz o numero1 se comportar como um input do html
let numero2 = document.getElementById('numero2') as HTMLInputElement;
let botao = document.getElementById('calcular');
let res = document.getElementById('resultado');

function calcular(n1, n2) {
    if(typeof n1 == 'number' && typeof n2 == 'number') {
        return n1 + n2;
    } else {
        n1 = parseInt(n1);
        n2 = parseInt(n2);
        return n1 + n2;
    }
}

botao.addEventListener('click', function() {
    res.innerHTML = calcular(numero1.value, numero2.value);
});
