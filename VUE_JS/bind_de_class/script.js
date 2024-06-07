let app = new Vue({
	el:'#app',
	data: {
		errorMsg: '',
		errorDivClass: {		// objeto 'errorDivClass' com todas as classes que podem ser ultilizadas
			ativo:false, 
			warning:false, 
			error:false
		}
	},
	methods: {
		showWarning:function(msg) {
			this.errorDivClass.ativo = true;		// 'true' indica que a classe está adiçionada
			this.errorDivClass.warning = true;
			this.errorDivClass.error = false;		// 'false' indica que a classe não está adiçionada
			this.errorMsg = msg;
		},
		showError:function(msg) {
			this.errorDivClass.ativo = true;
			this.errorDivClass.warning = false;
			this.errorDivClass.error = true;
			this.errorMsg = msg;
		},
		hideError:function(msg) {
			this.errorDivClass.ativo = false;
			this.errorDivClass.warning = false;
			this.errorDivClass.error = false;
			this.errorMsg = '';
		}
	}
});