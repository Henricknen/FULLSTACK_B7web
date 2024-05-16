let square = {      // objeto 'square' tem cada uma das casas e o que tem dentro dela 'vazias'
    a1: '', a2: '', a3: '',
    b1: '', b2: '', b3: '',
    c1: '', c2: '', c3: '',
};

let player = '';        // variável 'player' armazena de quem é a vez
let warning = '';           // variável 'warning' armazenará a menssagem
let playing = '';               // 'playing' indica de o jogo está rolando ou não

document.querySelector('.reset'). addEventListener('click', reset);     // criando evento de 'click' que chamará a função 'reset'

function reset() {
    warning = '';      // função 'reset' limpará os avisos 'warning'

    let random = Math.floor(Math.random() * 2);     // gera um número aleatório entre 0 e 1
    if(random === 0) {      // definindo o 'player'
        player = 'x';
    } else {
        player = 'o';
    }

    for(let in square) {        // zera(deixa sem nada) o tabuleiro do jogo da velha
        square[i] = '';
    }
}