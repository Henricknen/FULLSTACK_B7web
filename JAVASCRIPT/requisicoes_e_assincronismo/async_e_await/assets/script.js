async function loadPost() {     // 'async' indica que dentro desta função será ultilizado um 'await'
    
    let req = await fetch('https://jsonplaceholder.typicode.com/posts');        // 'await' espera a promise terminar para continuar
    let json = await req.json();        // 'await' espera o resultado da transformação do resultado em 'json'
    
    document.getElementById("posts"). innerHTML = json.length + 'Carregando...';
    montarBlog(json);       // mandando o resultado para função 'montarBlog'
}

function montarBlog(lista) {
    let html = '';

    for(let i = 0; i < lista.length; i++) {
        html += '<h3>' + lista[i]. title+ '</h3>';
        html += lista[i]. body + '<br/>';
        html += '<hr/>';
    }

    document.getElementById("posts"). innerHTML = html;
}