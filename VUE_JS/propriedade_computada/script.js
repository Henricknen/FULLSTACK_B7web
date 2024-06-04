let app = new Vue({
	el: '#app',
	data: {
                framework: 'Vue_js'
	},
        computed: {             // 'computed' é uma propriedade computada
                frameworkInvertido:function() {
                        return this. framework. split(''). reverse(). join('');         // retornando e invertendo nome do elemento 'framework'
                }
        }
});