let app = new Vue({
	el:'#app',
	data: {
		contagem: 0
	},
	methods: {
		teclou:function() {		// método 'teclou'
			this.contagem++;
		}
	}
});