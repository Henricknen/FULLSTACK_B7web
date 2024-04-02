function nomeCompleto(nome, sobrenome) {
    return `${nome} ${sobrenome}`;      // ultilizando 'return' encerra a função
}

let meuNome = nomeCompleto("Luis Henrique", "Silva Ferreira");      // 'nomeCompleto' envia o nome e sobrenome como parâmetros e o retorno da função será armazenado em 'meuNome'
console.log('Meu nome completo é: ' + meuNome);
