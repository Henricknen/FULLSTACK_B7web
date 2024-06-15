Vue.component('menu-superior', {		// 'componente' menu-superior
	data:function() {
		return {
			texto: 'Click'		// decrição que apareçera no botão
		};
	},
	template:'<button>{{ texto }}</button>'		// 'template' é uma propriedade do componente
});

let app = new Vue({
	el:'#app',
	data: {

	}
});