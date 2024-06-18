let busca = {		// variável busca
	template: `
		<div>
			....
		</div>
	`
}
let lista = {
	template: `
		<div>
			....
		</div>
	`
}

let app = new Vue({
	el: '#app',
	data: {
		produtos: [
			{nome: 'roupas', itens: [
				{nome: 'camisa', preco: '55.00', estoque: true},
				{nome: 'calça', preco: '72.82', estoque: true},
				{nome: 'bermuda', preco: '43.00', estoque: false}
			]},
			{nome: 'eletronicos', itens: [
				{nome: 'nootebook', preco: '1999.00', estoque: true},
				{nome: 'celular', preco: '499.99', estoque: false},
				{nome: 'iphone', preco: '7000.00', estoque: true},
			]}
		]
	},
	components: {		// tranformando variáveis 'busca' e 'lista' em componentes
		busca,
		lista
	}
});