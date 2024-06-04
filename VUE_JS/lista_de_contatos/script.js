let app = new Vue({
	el: '#app',
	data: {
                nomeInput: '',
                lista: []
	},
        methods: {
                add:function() {
                        if(this. nomeInput. length > 0) {       // verificando se usúario digitou algo
                                this. lista. push(this. nomeInput);             // inserindo o que foi digitado dentro de 'lista'

                                this. nomeInput = '';           // zera o campo para novas digitações
                        }
                }
        }
});