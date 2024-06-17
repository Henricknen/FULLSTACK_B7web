let bola = {		// bola componente 'local'
	template: `
	<div class = "bola">

	</div>
	`
};

Vue.component('sinal', {		// componente 'global' sinal
	components: {
		bola
	},
	template: `
		<div class = "sinal">
			<bola />
			<bola />
			<bola />
		</div>
	`
});

let app = new Vue({
	el: '#app',
	data: {

	},
	methods: {
		liberar:function() {

		},
		fechar:function() {
			
		}
	}
}); 