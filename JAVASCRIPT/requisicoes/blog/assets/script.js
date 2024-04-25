// https://jsonplaceholder.typicode.com/posts - link de API de posts

async function readPosts() {            // função que irar lê os posts
        let postArea = document.querySelector('.posts');
        postArea.innerHTML = "Carregando...";

        let response = await fetch('https://jsonplaceholder.typicode.com/posts');        // fazendo requisição
        let json = await response.json();

        if(json.length > 0) {           // verificando se encontrou dados da requisição
                postArea.innerHTML = '';

                for(let i in json) {            // loop do array dos posts
                        let postHtml = `<div><h1>${json[i].title}</h1>${json[i].body}<hr/></div>`;
                        postArea.innerHTML += postHtml;
                }
        } else {
                ppostArea.innerHTML = 'Nenhum post para ser exibido...';
        }
}

async function addNewPost(title, body) {        // função reçebe o 'title' e o 'body' e faz a requisição e vai enviar o 'title' e o 'body' pra requisição
        await fetch(
                'https://jsonplaceholder.typicode.com/posts',
                {
                        method: 'POST',
                        headers: {
                                'Content-Type': 'application/json'
                        },
                        body: JSON.strinify({
                                title: title,
                                body: body,
                                userId: 2
                        })
                }
        );

        document.querySelector('#titleField').value = '';       // limpando os campos
        document.querySelector('#bodyField').value = '';

        readPosts();    // executando a função 'readPosts'

}

document.querySelector('#isertButton').addEventListener('click', () => {       
        let title = document.querySelector('#titleField').value;        // pegando o valor que está digitado no campo de id 'titleField'
        let body = document.querySelector('#bodyField').value;

        if(title && body) {     // verificando se os campos estão preenchidos
                addNewPost(title, body);
        } else {
                alert("Preencha todos os campos...");
        }
});

readPosts();