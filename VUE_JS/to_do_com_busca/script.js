let busca = {		// variável busca
	data:function() {
		return {
			txt: '',		// propriedade do do 'texto digitado'
			only_stock: false		// propriedade do 'checkbox'
		}
	},
	methods: {
		buscar:function() {
			this.$emit('buscar', {txt:this.txt, only_stock:this.only_stock});		// '$emit' envia o evento 'buscar' com os objetos 'txt' e 'only_stok' para o html
		}
	},
	template: `
		<div>
			<input type = "text" placeholder = "Busca..." v-model = "txt" v-on:keyup = "buscar" /><br/>
			<input type = "checkbox" id = "only_stock" v-model = "only_stock" v-on:change = "buscar" />
			<label for = "only_stock">Mostrar apenas produtos em estoque</label>
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
	methods: {
		buscar:function(p) {
			let novaLista = [];

				for(let i in this.produtos) {		// navegando em produtos para fazer a filtragem
					let novositens = [];

					for(let w in this.produtos[i].itens) {		// percorrendo os itens da lista para se fazer a filtragem
							let vai = true;

							if(p.only_stock && this.produtos[i].itens[w].estoque == false) {
								vai = false;
							}

							if(p.txt != '' && this.produtos[i].itens[w].nome.toLowerCase(). indexOf(p.txt.toLowerCase()) == -1) {
								vai = false;
							}

							if(vai) {
								novositens.push(this.produtos[i].itens[w]);
							}
					}

					if(novositens.length > 0) {
						novaLista.push({		// adiçionando em 'novalista' a categoria dos itens filtrados
							nome:this.produtos[i].nome,
							itens:novositens
						});
					}
				}

				this.exibidos = novaLista;
		}
	},
	components: {		// tranformando variáveis 'busca' e 'lista' em componentes
		busca,
		lista
	}
});