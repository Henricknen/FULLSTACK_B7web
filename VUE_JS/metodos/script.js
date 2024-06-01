let app = new Vue({
    el: '#app',
    data: {
        nome: 'Luis Henrique S. F',     // propriedades
        profissional: 'FullStack',
        idade: 90
    },
    methods: {
        mostrar:(nome, profissional, idade)=> {     // função 'mostrar'
            let txt = 'Me chamo ' + nome + ', sou desenvolvedor ' + profissional + ' tenho '+ idade + ' anos';
            return txt;
        }
    }
});