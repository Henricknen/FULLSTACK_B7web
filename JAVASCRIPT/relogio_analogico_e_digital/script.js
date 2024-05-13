let digitaElement = document.querySelector('.digital');     // seleçionando o elemento do relógio digital
let sElement = document.querySelector('.p_s');        // selecionando o ponteiro de 'segundo'
let mElement = document.querySelector('.p_m');        // selecionando o ponteiro de 'minuto'
let hElement = document.querySelector('.p_h');        // selecionando o ponteiro de 'hora'

function updateClock() {        // função 'updateClock' atualizará o relógio
    let now = new Date();       // pegando a hora atual
    let hour = now.getHours();
    let minute = now.getMinutes();
    let secund = now.getSeconds();

    digitaElement.innerHTML = `${fixZero(hour)}:${fixZero(minute)}:${fixZero(secund)}`;

    let sDeg = ((360 / 60) * secund) - 90;     // variável 'sDeg' é o ângulo dos segundos
    let mDeg = ((360 / 60) * minute) - 90;
    
    sElement.style.transform = `rotate(${sDeg}deg)`;     // inserindo propriedade 'css' no ponteiro de segundos
    mElement.style.transform = `rotate(${mDeg}deg)`;
}

function fixZero(time) {
    if(time < 10) {     // enquanto o valor dos segundos, mintutos ou horas forem menor que 0 será acrescentado 0 antes
        return '0' + time;
    } else {
        return time;
    }
}

setInterval(updateClock, 1000);      // função 'setInterval' executa a função 'updateClock' a cada segundo '1000'