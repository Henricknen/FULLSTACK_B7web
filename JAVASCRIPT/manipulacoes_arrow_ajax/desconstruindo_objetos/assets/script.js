let profissional = {        // objeto 'profissional'
    nome: 'Luis Henrique',
    sobrenome: 'Silva Ferreira',
    idade: 90,
    formacao: {
        pos_graduacao: 'Desenvolvimento web',
        graduacao: 'Analise e desenvolvimento de sistemas',
        tecnico: 'Informatica para internet',
        curso: 'Programador Front End'
    },
    nomeCompleto: function() {
        return `${this.nome} ${this.sobrenome}`;
    }
};
                        // definindo valor 0 como padrão para 'idade'
let {nome, sobrenome, idade = 0} = profissional;       // as propriedade de dentro das chaves se torna variáveis independente, isso gera a descontrução do objeto

console.log(nome, sobrenome, idade);