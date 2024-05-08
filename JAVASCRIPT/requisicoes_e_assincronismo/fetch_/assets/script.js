document.getElementById("posts"). innerHTML = json.length + 'Carregando...';

function loadPost() {
    fetch('https://jsonplaceholder.typicode.com/posts')
        .then(function(resultado) {
            return resultado.json();
        })
        .then(function(json) {
            montarBlog(json);       // executando função 'montarBlog'
        })
        .catch(function(error) {
            console.log('Error...');
        });
}

function montarBlog(lista) {        // função 'montarBlog' reçebe uma lista de posts
    let html = '';

    for(let i = 0; i < lista.length; i++) {     // dando um 'for' na lista
        html += '<h3>' + lista[i]. title+ '</h3>';      // conteúdo, 'titulo'
        html += lista[i]. body + '<br/>';       // 'corpo' dos posts
        html += '<hr/>';
    }

    document.getElementById("posts"). innerHTML = html;     // jogando o html com os posts na tela
}