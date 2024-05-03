let timer;      // criando a variável 'timer' fora de todo contexto para ser usado em diferentes locais

function inicio() {
    timer = setInterval(showTime, 1000)     // 'timer' rodará a função de segundo em segundo, 'setInterval' ajusta o intervalo
}

function fim() {
    clearInterval(timer);        // 'clearInterval' limpa o intervalo
}

function showTime() {       // função responsável por exibir a hora atual na tela
    let d = new Date();
    let h = d.getHours();
    let m = d.getMinutes();
    let s = d.getSeconds();
    let txt = h + ':' + m + ':' + s;        // concatenando hora, minutos e secundos

    document.querySelector('.demostr'). innerHTML = txt;
}
