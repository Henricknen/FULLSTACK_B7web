document.querySelector('.busca'). addEventListener('submit', async (event)=> {       // adiçionanando um evento addEventListener um 'olheiro', quando for enviado o formulário, 'async' indica que a função excutará código que não é ordenado
    event.preventDefault();     // função 'preventDefault' previne o comportamento padrão do formúlario

    let input = document.querySelector('#searchInput'). value;      // armazenando na variável 'input' o que o usúario digitou

    if(input != '') {
        clearInfo();
        showWarning('Carregando...');

        let url = `https://api.openweathermap.org/data/2.5/weather?q=${encodeURI(input)}&appid=f4838ed66dee1f86bdf4ff4b4a14d845&units=metric&lang=pt_br`;      // variável url ultilizando llink de 'api'

        let results = await fetch(url);     // variável 'results' armazenará o resultado da requisição
        let json = await results.json();        // transformando o resultado em 'json'

        if(json.cod === 200) {      // 220 é quando se encontra um resultado, quando dá certo a requisição
            showInfo({      // montando objeto com informações
                name: json.name,
                country: json.sys.country,
                temp: json.main.temp,
                tempIcon: json.weather[0].icon,
                windSpeed: json.wind.speed,
                windAngle: json.wind.deg
            });

        } else {
            clearInfo();
            showWarning('Não foi encontrada está localização');
        }
    } else {
        clearInfo();        // quando não encontrar nada a tela será limpada
    }
});

function showInfo(json) {       // função 'showInfo' é espeçifica para mostrar as informações
    showWarning('');

    document.querySelector('.titulo').innerHTML = `${json.name}, ${json.country}`;
    document.querySelector('.tempInfo').innerHTML = `${json.temp} <sup>°C</sup>`;
    document.querySelector('.ventoInfo').innerHTML = `${json.windSpeed}} <span>Km/h</span>`;

    document.querySelector('.temp img').setAttribute('src', `https://openweathermap.org/img/wn/${json.tempIcon}@2x.png`)     // 'seleçionando' a imagem e trocando sua 'url'

    document.querySelector('.ventoPonto').style.transform = `rotate(${json.windAngle-90}deg)`;      // formantando angulo do icone do relógio

    document.querySelector('.resultado').style.display = 'block';       // exibi na tela o resultado com tudo preenchido
}

function clearInfo() {      // função removerá o 'showWarning' e ocultará o resultado
    showWarning('');
    document.querySelector('.resultado').style.display = 'none';
}

function showWarning(msg) {     // função 'showWarning' mostrará ou removerá algum aviso
    document.querySelector('.aviso'). innerHTML = msg;
}