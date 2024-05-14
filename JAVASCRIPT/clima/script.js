document.querySelector('.busca'). addEventListener('submit', async (event)=> {       // adiçionanando um evento addEventListener um 'olheiro', quando for enviado o formulário, 'async' indica que a função excutará código que não é ordenado
    event.preventDefault();     // função 'preventDefault' previne o comportamento padrão do formúlario

    let input = document.querySelector('#searchInput'). value;      // armazenando na variável 'input' o que o usúario digitou

    if(input != '') {
        showWarning('Carregando...');

        let url = `https://api.openweathermap.org/data/2.5/weather?q=${encodeURI(input)}&appid=f4838ed66dee1f86bdf4ff4b4a14d845&units=metric&lang=pt_br`;      // variável url ultilizando llink de 'api'

        let results = await fetch(url);     // variável 'results' armazenará o resultado da requisição
        let json = await results.json();        // transformando o resultado em 'json'

        console.log(json);
    }
});

function showWarning(msg) {     // função 'showWarning' mostrará ou removerá algum aviso
    document.querySelector('.aviso'). innerHTML = msg;
}