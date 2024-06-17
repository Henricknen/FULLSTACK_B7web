let postagem = {		// componente 'postagem'
	props: ['titulo'],
	methods: {
		responder:function() {
			this.$emit('responder', this.titulo);
		}
	},
	template: `
		<div>
			<h2>{{ titulo }}</h2>
			<p><slot></slot></p>
			<button v-on:click = "responder">Responder</button>
		</div>
	`
};

let conteudo = new Vue({
	el: '#conteudo',
	data: {
		responderAberto: false,
		respostaTitulo: ''		
	},
	methods: {
		abrirResposta:function(titulo) {
			this.responderAberto = true;
			this.respostaTitulo = titulo;
		}
	},
	components: {
		postagem
	}
});