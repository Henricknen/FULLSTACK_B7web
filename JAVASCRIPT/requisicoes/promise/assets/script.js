// https://jsonplaceholder.typicode.com/posts - link de API de posts

function clicou() {
        fetch('https://jsonplaceholder.typicode.com/pos2ts')            // inserinso numeral '2' no link da API para simular a função 'catch'
                .then((resposta) => {         // função '.then' quando reçebe uma 'response' resposta da requisição executa uma função espeçifica
                        return resposta.json();
                })
                .then((json) => {
                        alert(`Titulo do primeiro post: ${json[0].title}`);
                })
                .catch(() => {          // função '.catch' quando algo der errado
                        alert("Deu problema na requisição");
                })
                .finally(() => {        // função '.finally' é executada no final de tudo, dando certo ou errado
                        alert("Finalizando a execução do código...");
                })
}

document.querySelector('.botao').addEventListener('click', clicou);