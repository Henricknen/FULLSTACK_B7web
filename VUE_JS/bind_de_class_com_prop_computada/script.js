let app = new Vue({
	el:'#app',
	data: {		// data com apenas dois tipos de 'propriedades'
		errorMsg: '',
		errorType: ''
	},
	computed: {
		errorDivClass:function() {		// propriedade 'computada' errorDivClass que faz o processo de seleção
			let r = {
				ativo: false		// variável 'r' terá o resultado iniçiando em 'false', não mostrará o erro
			};

			if(this.errorMsg != '') {
				r.ativo = true;
			}

			if(this.errorType == 'warning') {		// verificação do 'tipo' do erro
				r.warning = true;
				r.error = false;
			} else if(this.errorType == 'error') {
				r.warning = false;
				r.error = false;
			}
			switch(this.errorType) {
				case 'warning':
					r.warning = true;
					r.error = false;
					break;
				case 'error':
					r.warning = false;
					r.error = true;
					break;
			}

			return r;
		}
	},
	methods: {		// as definições seta a 'menssagem' e o 'tipo' do erro
		showWarning:function(msg) {
			this.errorMsg = msg;
			this.errorType = 'warning';
		},
		showError:function(msg) {
			this.errorMsg = msg;
			this.errorType = 'error';
		},
		hideError:function(msg) {
			this.errorMsg = '';
		}
	}
});