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
                        
let {nome, sobrenome, formacao:{pos_graduacao, graduacao, tecnico}} = profissional;        // pegando informações do objeto formacao        // pegando informações do objeto formacao

console.log(nome, sobrenome, pos_graduacao, graduacao);