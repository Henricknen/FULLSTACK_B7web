let app = new Vue({
	el: '#app',
	data: {
                primeiroNome: '',
                segundoNome: '' 
	},
        computed: {
                nomeCompleto: {         // objeto 'nomeCompleto' com dois itens, 'get' e 'set'
                        get:function() {
                                return this.primeiroNome + ' ' + this.segundoNome;
                        },
                        set:function(novoValor) {
                                let nomes = novoValor.split(' ');               // cria um array com o primeiro e segundo nome usando um espaço como delimitador
                                this.primeiroNome = nomes[0];
                                this.segundoNome = nomes[1];
                        }
                }
        }
});