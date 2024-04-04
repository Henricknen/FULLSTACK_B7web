let count = 0;      // variável de escopo global 'count' pode ser usada dentro de qualquer função

function add() {
    let count = 0;      // variável de escopo 'local'
    count++;        // incrementando variável que está fora da função
}

add();      // chamando a função
add();

console.log(count);     // imprimindo variável