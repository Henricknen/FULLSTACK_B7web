let app = new Vue({
	el:'#app',
	data:{
		nomeInput:'',
		aviso:'',
		nomePronto:false,
		lista:[],
		timer:null
	},
	watch:{
		nomeInput:function(){
			if(this.timer != null) {
				clearTimeout(this.timer);
			}

			if(this.nomeInput != '') {		// se campo 'nomeInput' estiver sendo preenchido
				this.aviso = 'Digitando...';		// mostrará esse aviso
				this.nomePronto = false;
				this.timer = setTimeout(this.ficarPronto, 1000);
			}
		}
	},
	methods:{
		ficarPronto:function(){
			this.aviso = '';

			if(this.nomeInput.length > 2) {			// se campo 'nomeInput' tiver mais que 2 caracteres o botão aparecerá
				this.nomePronto = true;
			}
		},
		add:function() {	// função 'add' adiçiona os nomes na lista
			this.lista.push(this.nomeInput);
			this.nomeInput = '';
			this.nomePronto = false;
		}
	},
	computed:{
		totalTexto:function(){		// 'totalTexto' é uma propriedade computada
			return "Total de nomes: "+this.lista.length;
		}
	}
});