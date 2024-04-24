// https://jsonplaceholder.typicode.com/posts - link de API de posts

async function clicou() {
        let response = await fetch('https://jsonplaceholder.typicode.com/posts')             // 'await' faz a requisição esperar, a requisição será armazenada na variável 'response'
        let json = await response.json();       // transformando a resposta da requisição em 'json'

        alert(`Titulo do primeiro post: ${json[0].title}`);
        alert("Clicou");
}

async function inserir() {
        let response = await fetch(          // 'fetch' faz a requisição de envio
                'https://jsonplaceholder.typicode.com/posts',                // mesma url ultilizada para ler é ultilizada para 'inserir' posts
                 {
                        method: 'POST',                 // 'method' espeçifica o método 'POST' que será ultilizado
                        headers: {       // em 'header' espeçifica o tipo de dado que será enviado
                                'Content-Type': 'aplication/json'
                        },
                        body: JSON.stringify({          // em 'body' é o corpo da rquisição, são os proprios dados
                                title: 'Título',
                                body: 'Corpo',
                                userId: 2
                        })
                 });

        let json = await response.json();
        console.log(json);      // jogando o objeto no 'console.log'
}

document.querySelector('.botao').addEventListener('click', clicou);
document.querySelector('.inserir').addEventListener('click', inserir);