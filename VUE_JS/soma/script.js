let app = new Vue({
    el: '#app',
    data: {
        n1: Math.floor(Math.random() * 30),      // 'Math.random' gera um número aleatório
        n2: Math.floor(Math.random() * 30),
        n3: 0
    }
});