let app = new Vue({
	el:'#app',
	data: {
		busca: '',
		formacao: ['pos - desenvolvimento web', 'graduacao - analise e desenvolvimento de sistemas', 'tecnico - informatica para internet', 'curso - pogramador front end']
	},
	computed: {
		nomesFiltrados:function() {
			return this.formacao.filter(function(formacao) {
				if(this.busca != '') {

					if(formacao.toLowerCase().indexOf(this.busca.toLowerCase()) > -1) {
						return true;
					} else {
						return false;
					}
				} else {
					return true;
				}
			}, this);
		}
	}
});