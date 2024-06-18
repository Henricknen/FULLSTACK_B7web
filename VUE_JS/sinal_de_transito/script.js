let bola = {		// bola componente 'local'
	props: ['cor'],
	template: `
	<div class = "bola" v-bind:class = "cor">

	</div>
	`
};

Vue.component('sinal', {		// componente 'global' sinal
	props: ['status'],
	components: {
		bola
	},
	template: `
		<div class = "sinal">
			<template v-if = "status == 'red'">
				<bola cor = "red"/>
				<bola />
				<bola />
			</template>
			<template v-else-if = "status == 'yellow'">
				<bola />
				<bola cor = "yellow"/>
				<bola />
			</template>
			<template v-else-if = "status == 'green'">
				<bola />
				<bola />
				<bola cor = "green"/>
			</template>
		</div>
	`
});

let app = new Vue({
	el: '#app',
	data: {
		sinalStatus: 'red'		// 'sinalStatus' indica a cor do sinal
	},
	methods: {
		liberar:function() {
			this.sinalStatus = 'green';
		},
		fechar:function() {
			this.sinalStatus = 'yellow';

			setTimeout(this.fecharSinal, 1000);
		},
		fecharSinal:function() {
			this.sinalStatus = 'red';
		}
	}
}); 