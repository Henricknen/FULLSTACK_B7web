// https://jsonplaceholder.typicode.com/posts - link de API de posts

// https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Status - link de site de 'códigos de status de resposta HTTP'

function clicou() {
        fetch('https://jsonplaceholder.typicode.com/pos2ts')            // inserindo numeral '2' no link da API para simular a função 'catch'
                .then((response) => {
                        console.log(`Status: ${response.status}`);              // o item '.status' mostra o status da requisição
                })
                .then((json) => {
                        alert(`Titulo do primeiro post: ${json[0].title}`);
                })
                .catch(() => {
                        alert("Deu problema na requisição");
                })
}

document.querySelector('.botao').addEventListener('click', clicou);