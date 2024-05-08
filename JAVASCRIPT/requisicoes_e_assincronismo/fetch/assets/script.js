document.getElementById("posts"). innerHTML = json.length + 'Carregando...';

function loadPost() {
    fetch('https://jsonplaceholder.typicode.com/posts')     // função 'fetch' retorna uma 'promise', contém 2 parâmetros, 1º é a url que será feita a requisição e o 2º é opçional, um objeto com as configurações da requisição
        .then(function(resultado) {
            return resultado.json();        // transformando o resultado da requisição em 'json'
        })
        .then(function(json) {      // 'then' reçebe o 'json' já montado
            document.getElementById("posts"). innerHTML = json.length + ' Posts';       // passando para o elemento de id 'posts' a 'json.length' quantidade de posts da requisição
        })
        .catch(function(error) {
            console.log('Error...');
        });
}