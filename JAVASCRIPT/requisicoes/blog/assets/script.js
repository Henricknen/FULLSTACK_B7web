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

readPosts();