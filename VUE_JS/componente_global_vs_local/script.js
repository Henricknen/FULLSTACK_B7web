Vue.component('contador', {		// componente 'global'
	template: '<button>Clicou x vezes</button>'
});



let menuSuperior = {		// componente 'local'
	template: '<span>MENU</span>'
}



let header = new Vue({
	el: '#header',
	data: {
		title: 'Titulo do site'
	},
	components: {		// relaçionando componente 'local' menuSuperior com a instançia 'header'
		'menu-superior': menuSuperior
	}
});

let sidebar = new Vue({
	el: '#sidebar',
	data: {
		item: 'Alguma coisa'
	}
});