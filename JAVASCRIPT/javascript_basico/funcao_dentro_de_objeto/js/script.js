let pessoa = {      // objeto pessoa
    nome: 'Luis Henrique',
    sobrenome: 'Silva Ferreira',
    idade: 90,
    nomeCompleto: function() {      // função 'sem nome' criada dentro da propriedade nomeCompleto
        return `${this.nome} ${this.sobrenome}`;     // this é uma 'keyword' em portugues se lê palavra chave, ele se refere ao proprio objeto
    }
}

console.log(pessoa.nomeCompleto());      // ultilizando a função criada dentro do objeto