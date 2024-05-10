async function inserirPost() {      // ultilizando 'async' antes da função para poder ultilizar 'await' no código
    document.getElementById('posts'). innerHTML = 'Carregando...';

    let req = await fetch('https://jsonplaceholder.typicode.com/posts', {       // url que será feita a requisição
        method: 'POST',
        body: JSON.stringify({      // envia dados atráves do corpo da requisição, 'stringify' transforma o objeto em uma string com objeto dentro
            title: 'Título',    // dados que será enviados
            body: 'Corpo',
            userId: 4
        }),
        headers: {      // cabeçalho que também será enviado
            'content-type': 'application/json'
        }
    });
    let json = await req.json();        // reçebendo o resultado

    console.log(json);
}