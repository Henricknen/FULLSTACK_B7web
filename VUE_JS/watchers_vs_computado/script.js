let app = new Vue({
	el: '#app',
	data: {
                primeiroNome: '',
                segundoNome: '',
                nomeCompleto: ''
	},
        // computed: {          // criação de 'propriedade computada'
        //         nomeCompleto:function() {
        //                 return this.primeiroNome + ' ' + this.segundoNome;
        //         }
        // }
        watch: {                // criando um 'watch'
                primeiroNome:function() {
                        this.nomeCompleto = this.primeiroNome + ' ' + this.segundoNome;         // quando for alterado primeiro nome está função alterará 'nomeCompleto'
                },
                segundoNome:function() {
                        this.nomeCompleto = this.primeiroNome + ' ' + this.segundoNome;                        
                }
        }
});