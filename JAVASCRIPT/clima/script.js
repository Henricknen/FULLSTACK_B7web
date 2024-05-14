document.querySelector('.busca'). addEventListener('submint', (event)=> {       // adiçionanando um evento addEventListener um 'olheiro', quando for enviado o formulário
    event.preventDefault();     // função 'preventDefault' previne o comportamento padrão do formúlario

    let input = document.querySelector('#searchInput'). value;      // armazenando na variável 'input' o que o usúario digitou

    if(input != '') {
        showWarning('Carregando...');
    }
});

function showWarning(msg) {     // função 'showWarning' mostrará ou removerá algum aviso
    document.querySelector('.aviso'). innerHTML = msg;
}