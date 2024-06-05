let app = new Vue({
	el: '#app',
	data: {
                nome: 'Luis Henrique S. F.',
                numero: 5
	},
        computed: {
                aleatorio:function() {
                        let al = Math.floor(Math.random() * 100);       // criando numero aleatório entre 0 e 100
                        return this.numero + " + " + al + " = "+ (this.numero + al);            // retornando soma de numero aleatório com numero da variável numero
                }
        },
        methods: {
                nomeInvertido:function() {
                        return this. nome. split(''). reverse(). join('');
                },
                aleatorioFuncao:function() {            // método 'aleatorioFuncao'
                        let al = Math.floor(Math.random() * 100);
                        return this.numero + " + " + al + " = "+ (this.numero + al);
                }
        }
});