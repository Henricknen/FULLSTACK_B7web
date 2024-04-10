let hardskill = ['php', 'javascript', 'sql', 'laravel', 'python', 'github'];

let minhas = hardskill.filter((item) => {       // a função filter gerará um novo array chamado 'minhas'

    if(item.length > 4) {    // verificando a quantidade de caracteres
        return true;        // se passar pela condição o item será pego
    } else {
        return false;
    }
});

console.log(minhas);

let ok = hardskill.every((value) => {       // função every significa todos e retornará verdadeiro ou falso
    if(value.length > 3) {      // se o nome dos itens tiverem mais que 3 caracteres
        return true;
    } else {
        return false;
    }
});

if(ok) {
    console.log('Todos são maior que 3');
} else {
    console.log('Não são maiores que 3');
}