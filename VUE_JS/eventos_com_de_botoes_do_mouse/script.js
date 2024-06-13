let app = new Vue({
	el:'#app',
	data: {
		contagem: 0
	},
	methods: {
		teclou:function() {
			this.contagem++;
		}
	}
});