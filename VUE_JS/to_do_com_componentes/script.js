Vue.component('todo-adicionar', {		// componente 'global' todo-adicionar
	data:function() {
		return {
			txt: ''		// tudo o que for digitado no input será salvo em 'txt'
		}
	},
	methods: {
		add:function() {
			this.$emit('add', this.txt);
		}
	},
	template: `
		<div>
			<input type = "text" v-model = "txt" />
			<button v-on:click = "add">Adicionar</button>		
		</div>
	`
});

let lista ={		// componente 'lista' fará a listagem dos itens
	props: ['itens'],
	template:`
		<ul>
			<li v-for = "item in itens">{{ item }}</li>
		</ul>
	`
};

let header = new Vue({
	el: '#header',
	methods: {
		addTodoItem:function(txt) {
			sidebar.addItem(txt);
		}
	}
});

let sidebar = new Vue({
	el: '#sidebar',
	data: {
		itens: ['lista']		// array 'itens' onde será armazenado os itens adiçionados pelo usuário
	},
	methods: {
		addItem:function(txt) {
			this.itens.push(txt);		// dando um push 'dentro' do array
		}
	},
	components: {
		lista
	}
});