let cores = [
    {nome: 'preto', qtd: 10},
    {nome: 'branco', qtd: 5},
    {nome: 'vermelho', qtd: 7},
    {nome: 'azul', qtd: 4},
    {nome: 'verde', qtd: 6}
];
// cores.push('amarelo');

for(let n = 1; n < cores.length; n++) {     // 'cores.length' pega a quantidade de itens que tem dentro do array
    console.log(cores[n].nome);      // '[n]' será a chave
}

console.log('------------- chave --------------------');

for(let i in cores) {       // 'i' é a chave do array cores
    console.log(cores[i].nome);      // 'cores[i]' ultilzando a chave para acessar os itens
}

console.log('-------------- valor -------------------');

for(let cor of cores) {     // 'cor' é o valor do array cores
    console.log(`Nome: ${cor.nome} - ${cor.qtd}`);
}

console.log('-------------- alterando -------------------');

for(let i in cores) {
    cores[i]. nome = cores[i]. nome. toUpperCase();     // função 'toUpperCase' altera o tamanho dos nomes para maisculos
    console.log(cores);
}