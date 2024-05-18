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
    if(playing && square[item] === '') {
        square[item] = player;      // preenchendo 'square' com o jogador da vez
        renderSquare();
        togglePlayer();
    }
}

function reset() {
    warning = '';      // função 'reset' limpará os avisos 'warning'

    let random = Math.floor(Math.random() * 2);     // gera um número aleatório entre 0 e 1
    player = (random === 0) ? 'x' : 'o';

    for(let i in square) {        // zera(deixa sem nada) o tabuleiro do jogo da velha
        square[i] = '';
    }

    playing = true;

    renderSquare();
    renderInfo();
}

function renderSquare() {       // função mostra as informações na tela
    for(let i in square) {      // percorre a variável 'square'
        let item = document.querySelector(`div[data-item=${i}]`);       // seleçionando o item espeçifico do 'square'
        item.innerHTML = square[i];
    }

    checkGame();
}

function renderInfo() {     // função mostra as informações
    document.querySelector('.vez'). innerHTML = player;
    document.querySelector('.resultado'). innerHTML = warning;
}

function togglePlayer(){        // função altenará o jogador
    player = (player === 'x') ? 'o' : 'x';
    renderInfo();

}

function checkGame() {      // função verifica quem ganhou
    if(checkWinnerFor('x')) {
        warning = 'O "x" venceu';
        playing = false;
    } else if(checkWinnerFor('o')) {
        warning = 'O "o" venceu';
        playing = false;
    } else if(isFull()) {
        warning = 'Deu empate';
        playing = false;
    }
}

function checkWinnerFor() {
    let pos = [
        'a1, a2, a3',       // possibilidades de vitória na 'horizontal'
        'b1, b2, b3',
        'c1, c2, c3',

        'a1, b1, c1',       // possibilidade de vitória na 'vertical'
        'a2, b2, c2',
        'a3, b3, c3',

        'a1, b2, c3',     // possibilidade de vitória na 'transversal'
        'a3, b2, c1',
    ];

    for(let w in pos) {     // verifica se o player está com as posições preenchidas
        let pArray = pos[w]. split(',');        // cria um array com 'a1, a2 e a3'
        let hasWon = pArray.every(option=> square[option] === player);        // se variável hasWon estiver preenchida é sinal que o 'player' ganhou
        if(hasWon) {
            return true;        // será retornado 'true'
        }
    }

    return false;
}

function isFull() {     // função 'isFull' verefica o empate
    for(let i in square) {
        if(square[i] === '') {      // se square estiver algum item vazio 
            return false;       // o jogo não acabou
        }
    }

    return true;        // indica que está tudo preenchido
}
