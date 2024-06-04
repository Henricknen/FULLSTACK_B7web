let app = new Vue({
	el: '#app',
	data:{
                n: 14,
                aviso: true
	},
        methods: {
                clicou:()=> {
                        alert("Evento funcionou! CLICOU...");
                },
                enviou:()=> {
                        alert("ENVIOU...");
                }
        }
});