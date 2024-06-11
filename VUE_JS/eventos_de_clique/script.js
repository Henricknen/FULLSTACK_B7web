let app = new Vue({
	el:'#app',
	data: {
		contagem: 0
	},
	methods: {
		addContagem:function() {
			this.contagem++;
		},
		addContagemm:function(x) {
			this.contagem += x;
		}
	}
});