// https://jsonplaceholder.typicode.com/posts - link de API de posts

function clicou() {
        fetch('https://jsonplaceholder.typicode.com/posts')               // função do javascript 'fetch' serve para fazer requizições
                .then((resposta) => {         // '.then' quando reçebe uma 'response' resposta da requisição executa uma função espeçifica
                        return resposta.json();
                })
                .then((json) => {       // 'json' é a resposta transformada em objeto
                        alert(`Titulo do primeiro post: ${json[0].title}`);           // exibindo o titulo do primeiro item do do 'objeto' json que é um 'array'
                })
}

document.querySelector('.botao').addEventListener('click', clicou);     // evento de 'click'