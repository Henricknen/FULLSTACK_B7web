let lista = [45, 5, 84, 46, 15, 85, 18];        // array de numeros
let lista2 = [];        // array de numeros vazio
let lista3 = [
    {id: 1, nome: 'Luis Henrique', profissao: 'programador'},
    {id: 2, nome: 'Joao', profissao: 'professor'},
    {id: 3, nome: 'Maria', profissao: 'instrutoria'},
]

// ----------------------------------------------------------------------------------------------------------------------

lista2 = lista.find(function(item) {        // função 'find' retorna o primeiro item que satisfaz a codição requirida
    return (item == 15) ? true : false;
});

let res = lista2;
console.log(res);

// ----------------------------------------------------------------------------------------------------------------------

lista2 = lista.findIndex(function(item) {        // função 'findIndex' retorna a posição do item
    return (item == 15) ? true : false;
});

let ress = lista2;
console.log(ress);

// ----------------------------------------------------------------------------------------------------------------------

let profissional = lista3.find(function(item) {
    return (item.id == 1) ? true : false;       // find vai retorna o objeto de id igual a 1
});

let resss = profissional;
console.log(resss);