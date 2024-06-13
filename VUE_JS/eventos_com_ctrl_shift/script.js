let app = new Vue({
	el:'#app',
	data: {
		contagem: 0
	},
	methods: {
		teclou:function() {
			this.contagem++;
		},
		teclou2:function() {		// método teclou2 aumenta a comtagem de 10 em 10
			this.contagem += 10;
		},
		teclou3:function() {		// método teclou2 aumenta a comtagem de 20 em 20
			this.contagem += 20;
		}
	}
});