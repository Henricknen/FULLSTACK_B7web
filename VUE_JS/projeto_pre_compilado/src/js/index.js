import App from './App.vue';        // carregando o arquivo 'App.vue'

new Vue({       // instançiando o objeto 'vue'
    el: '#app',
    render: h => h(App)
});