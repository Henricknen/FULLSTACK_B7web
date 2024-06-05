let app = new Vue({
	el: '#app',
	data: {
                conta: '',
                aviso: '',
                resultado: '',
                timer: null
	},
        methods: {
                fazerConta:function() {
                        this. aviso = '',

                        this. resultado = eval(this.conta);             // 'eval' tranforma a string em código e realiza a conta, salvando o resutado em 'resultado'
                }
        },
        watch: {                // será executado enquanto usuário altera algo
                conta:function() {
                        this. aviso = 'Digitando...';           // alterando 'aviso' insirindo 'Digitando'

                        if(this.timer != null) {
                                clearTimeout(this.timer);               // zerando o 'timer'
                        }

                        this.timer = setTimeout(this.fazerConta, 1000);         // iniciando 'timer' de 1 segundo
                }
        }
});