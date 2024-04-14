const input = document.querySelector('input');      // pegando os elementos que serão manipulados 'input' 'ul'
const lista = document.querySelector('ul');

function handleKeyUp(e) {       // passando como parâmetro a tecla digitada
    if(e.key === 'Enter') {
        const novoElemento = document.createElement('li');      // criando 'novoElemento'
        novoElemento.innerHTML = input.value;       // inserindo o texto digitado no input, em 'novoElemento'
        lista.appendChild(novoElemento);        // adiçionando o elemento na 'lista'

        input.value = '';       // limpa o campo do input após teclado enter
    }
}

input.addEventListener('keyup', handleKeyUp);        // evento que quando uma tecla no 'input' for pressionada e for solta novamente a função 'handleKeyUp' sera executada