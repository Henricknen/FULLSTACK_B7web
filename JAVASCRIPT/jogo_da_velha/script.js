let square = {      // objeto 'square' tem cada uma das casas e o que tem dentro dela 'vazias'
    a1: '', a2: '', a3: '',
    b1: '', b2: '', b3: '',
    c1: '', c2: '', c3: '',
};

let player = '';        // variável 'player' armazena de quem é a vez
let warning = '';           // variável 'warning' armazenará a menssagem
let playing = '';               // 'playing' indica de o jogo está rolando ou não

reset();        // executando a função 'reset' para iniçiar dando um reset

document.querySelector('.reset'). addEventListener('click', reset);     // criando evento de 'click' que chamará a função 'reset'
document.querySelectorAll('.item'). forEach(item => {       // 'querySelectorAll' seleçiona mais de um item que tem a classe 'item'
    item.addEventListener('click', itemClick);      
});

function itemClick() {
    let item = event.target.getAttribute('data-item');      // pegando o atributo 'data-item' para saber em quem foi clicado
    console.log('clicou  em ', item);
}

function reset() {
    warning = '';      // função 'reset' limpará os avisos 'warning'

    let random = Math.floor(Math.random() * 2);     // gera um número aleatório entre 0 e 1
    if(random === 0) {      // definindo o 'player'
        player = 'x';
    } else {
        player = 'o';
    }

    // for(let i in square) {        // zera(deixa sem nada) o tabuleiro do jogo da velha
    //     square[i] = '';
    // }

    playing = true;

    renderSquare();
    renderInfo();
}

function renderSquare() {
    for(let i in square) {      // percorre a variável 'square'
        let item = document.querySelector(`div[data-item=${i}]`);       // seleçionando o item espeçifico do 'square'
        item.innerHTML = square[i];
    }
}

function renderInfo() {
    document.querySelector('.vez'). innerHTML = player;
    document.querySelector('.resultado'). innerHTML = warning;
}