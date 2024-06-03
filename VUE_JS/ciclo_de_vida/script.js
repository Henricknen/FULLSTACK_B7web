let app = new Vue({
    el: '#app',
    data: {
        nome: 'Luis Henrique S. F.',
        framework: 'Vue.js',
        desenvolvedor: 'FullStack',
        nacionalidade: 'Brasileiro',
        ano: 2024
    },

    beforeCreate:function() {       // 'beforeCreate' permite executar algo antes do elemento ser criado
        alert(this. nome);      // 'alert' mostrará 'undefined' pois será executado antes do elemento 'app' ser criado
    },

    created:function() {        // 'created' é para criar o elemento na memoria, então o elemento será mostrado
        alert(this.framework);
    },

    beforeMount:function() {        // 'beforeMount' cria antes de exibir na tela
        alert(this.desenvolvedor);
    },

    mounted:function() {        // 'mounted' é a renderização do elemento
        alert(this.nacionalidade);
    },

    updated:function() {        // 'updated' executa o elemento assim que o mesmo ser modificado
        alert(this.desenvolvedor);
    }

});