let busca = {		// variável busca
	template: `
		<div>
			....
		</div>
	`
}
let lista = {
	props: ['itens'],		// reçebendo as props 'propriedades' itens
	template: `
		<div>
			<table border = "0" width = "200">
				<tr>
					<th>Nome</th>
					<th>Preço</th>
				</tr>

				<template v-for = "cat in itens">
					<tr>
						<td colspan = "2"><strong>{{ cat.nome }}</strong></td>
					</tr>
					<tr v-for = "p in cat.itens">
						<td v-if = "p.estoque">{{ p.nome }}</td>
						<td v-else style = "color:red">{{ p.nome }}</td>						
						<td>{{ '$' + p.preco }}</td>
					</tr>
				</template>

			</table>
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
		],
		exibidos: []		// lista que será exibida
	},
	created:function() {
		this.exibidos = this.produtos;
	},
	components: {		// tranformando variáveis 'busca' e 'lista' em componentes
		busca,
		lista
	}
});