// https://jsonplaceholder.typicode.com/posts - link de API de posts

function clicou() {
        fetch('https://jsonplaceholder.typicode.com/posts')             // url para 'lê' os posts
                .then((response) => {
                        return response.json();
                })
                .then((json) => {
                        alert(`Titulo do primeiro post: ${json[0].title}`);
                })
                .catch(() => {
                        alert("Deu problema na requisição");
                })
}

function inserir() {
        fetch(          // 'fetch' faz a requisição de envio
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
                 })
                 .then((response) => {          // '.then' pega a resposta da requisição
                        return response.json();         // convertendo a resposta em um 'objeto'
                 })
                 .then((json) => {
                        console.log(json);
                 });

}

document.querySelector('.botao').addEventListener('click', clicou);
document.querySelector('.inserir').addEventListener('click', inserir);