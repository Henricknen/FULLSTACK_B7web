function adicionar(...numeros) {      // '...' antes do parâmetro da função se chama operador 'rest'
    
    console.log(numeros);

}

adicionar(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

// ------------------------------------------------------------------------------------------------------

function profissional(...nome) {
    
    console.log(nome);
}

profissional('Luis', 'Henrique', 'Silva', 'Ferreira');      // este operador permite enviar 'number' e 'strings'

// ------------------------------------------------------------------------------------------------------

function formacao(pos, graduacao, ...tecnicos) {        // ultilizando operador 'rest' para reçeber mais de um parâmetro em '...tecnicos'
    let formacoes = [
        pos,
        graduacao,
        ...tecnicos     // ultilizando operador 'spread' para aproitar os parâmetros de '...tecnicos'
    ];

    return formacoes;
}

let pos = 'Desenvolvimento web';
let graduacao = 'Análise e desenvolvimento de sistemas';
let formacoes = formacao(pos, graduacao, 'Informática para internet', 'Eletroeletrônica');      // chama a função formação passando variável pos, graduacao e strings como parâmetros

console.log(formacoes);
