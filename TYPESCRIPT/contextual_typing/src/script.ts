let hardskills = ['php', 'javascript', 'laravel', 'sql', 'html', 'css', 2024];      // declaração de um array chamado 'hardskills' que contém uma lista de habilidades, sendo o último elemento um ano

hardskills.forEach( function(nome) {        // método 'forEach' iterar sobre cada elemento do array 'hardskills', função anônima passada para 'forEach' será executada uma vez para cada elemento do array
    
    if(typeof nome === 'string') {      
        console.log(nome.toUpperCase());        // se o elemento atual 'nome' for uma string, as letras será tranformadas em maiúsculas
    } else {
        console.log(nome);      // se não for uma string será um numero e será apenas impresso no console
    }
});
