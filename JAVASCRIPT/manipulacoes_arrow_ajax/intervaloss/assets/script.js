let timer;
function rodar() {
    timer = setTimeout(function () {        // setTimeout executará a função que esta sendo passado como primeiro parâmetro
        document.querySelector('.demostr').innerHTML = 'Rodou...';
    }, 2000);       // segundo parâmetro de 'setTimeout' é o tempo determinado do evento
}

function parar() {
    clearTimeout(timer);        // 'clearTimeout' encerra o timer
}