let frutas = ['Maça', 'Uva', 'Banana'];     // criando loop 'for' que mostrará todas as frutas do array
for(let x in frutas) {      // 'x' é o índice de cada elemento do array em cada iteração
    console.log(frutas[x]);     // imprimindo a fruta atual
}

console.log('-----------------------------------');

let n = 1;      // loop 'while' fará a contagem de 1 a 100
while(n <= 100) {       // o loop continuará enquanto 'n' for menor ou igual a 100
    console.log(n);
    n++;        // incrementando 'n' para a próxima iteração
}