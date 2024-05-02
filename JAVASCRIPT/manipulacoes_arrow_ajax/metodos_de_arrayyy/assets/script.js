let lista = [45, 5, 84, 46, 15, 85, 18];        // array de numeros
let lista2 = [];        // array de numeros vazio

lista2 = lista.map(function(item) {     // função 'map' vai percorre o array e executar uma função em dos itens do array
    return item * 2;        // retornando o valor do item do array, multiplicado por 2, e adiçiona no array2
});

let res = lista2;       // salvando o resultado dentro da variável 'res'
console.log(res);

// ------------------------------------------------------------------------------------------------------------

for(let i in lista) {       // elemento 'i' percorre cada elemento da lista
    lista2.push(lista[i] * 2);      // adiçionando elemento 'i' multiplicado por 2 no array lista2
}

let ress = lista2;
console.log(ress);


// ------------------------------------------------------------------------------------------------------------

lista2 = lista.filter(function(item) {      // função 'filter' vai rodar uma função que fará uma filtragem no array
    if(item < 20) {
        return true;
    } else {
        return false;
    }
});

let resss = lista2;
console.log(resss);

// ------------------------------------------------------------------------------------------------------------

lista2 = lista.every(function(item) {      // função 'every' é semelhante a função filter, mas não gera um novo array só retorna 'true' ou 'false'
    if(item > 20) {
        return true;
    } else {
        return false;
    }
});

let ressss = lista2;
console.log(ressss);