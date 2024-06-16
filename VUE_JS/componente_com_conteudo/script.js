Vue.component('aviso', {		// componente global
	template: '<div class = "aviso"><slot></slot></div>'
});

let postagem = {		// componente 'postagem'
template: `
	<div>
		<h2><slot name = "titulo"></slot></h2>
		<p><slot name = "corpo"></slot></p>
	</div>
`
};

let conteudo = new Vue({
	el: '#conteudo',
	data: {
		
	},
	components: {
		postagem
	}
});