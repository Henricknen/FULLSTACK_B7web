let ingredientes = [        // array ingredientes
    'agua',
    'farinha',
    'ovo',
    'corante',
    'sal'
];

ingredientes[5] = 'chocolate';      // 'incrementando' o ingrediente chocolate no indiçe 5 do array
ingredientes.push('fermento');          // adiçionando ingrediente fermento ultilzando função 'push', que é a forma correta de fazer adição

ingredientes.shift();       // função shift remove o primeiro item do array
ingredientes.pop();     // função 'pop' remove o ultimo item

console.log(ingredientes);
console.log(`Total de ingredientes: ${ingredientes.length}`);       // 'length' retorna a quantidade de itens que tem no array