let app = new Vue({
	el:'#app',
	data: {
		aviso: 'Aviso aleatório',
		avisoBase: {
			border: '2px solid #000',
			fontSize: '20px',
			padding: '10px'
		},
		avisoError: {
			backgroundColor: '#FF0000',
			color: '#FFF',
			fontSize: '30px'
		}
	}	
});