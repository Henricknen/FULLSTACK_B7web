Vue.component('contador', {		// componete 'contador'
	data:function() {
		return {
			c: 0
		};
	},
	methds: {
		aumentar:function() {		// método aumentar
			this.c++;
		}
	},
	template: '<div><span>{{ c }}</span> <button v-on:click = "c++">Aumentar</button></div>'		// 'template' contém 'div' com 'span' e 'button'
});

let app = new Vue({
	el:'#app',
	data: {

	}
});