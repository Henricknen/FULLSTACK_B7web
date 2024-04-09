let frutas = ['Laranja', 'Morango', 'Uva', 'Maça', 'Banana'];       // array de frutas
frutas.push('Kiwi');        // 'push' adiçiona Kiwi no final do array

console.log(frutas);
frutas[3] = 'Pêra';             // 'substituindo' o item que está no 'indiçe 3' por Pêra
console.log(frutas);

frutas[frutas.length - 1] = 'Goiaba';       // alterando o 'último' item por Goiaba
console.log(frutas);

frutas.shift();       // 'shift' remove o primeiro item do array
console.log(frutas);

frutas.pop();               // 'pop' remove o último item do array
console.log(frutas);

console.log(frutas.length);     // 'length' mostra quantos itens tem no array
console.log(frutas.join('-'));      // 'join' junta os elementos do array usando '-' como separador