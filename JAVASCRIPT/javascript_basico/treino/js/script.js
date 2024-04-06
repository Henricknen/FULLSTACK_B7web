let carros = ['BMW', 'Ferrari', 'Mercedes'];        // array contendo carros

let x = 1;      // variável 'x' armazenando o item do indiçe 1
console.log('1. ' + carros[x]);     // imprimindo item da variável 'x' na tela

carros[1] = 'Audi';     // trocando o item do indiçe 1 por Audi
console.log('Trocando Ferrari por Audi:');
console.log(carros);

carros.push('Volvo');       // 'push' adiçiona Volvo
console.log('Adiçionando Volvo na lista:');
console.log(carros);

console.log('exibindo a quantidade de itens do array:');
console.log(carros.length);     // 'length' realiza a 'contagem' de itens do array

