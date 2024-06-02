function bandeira(pais) {
    return '<img src = "paises/' + pais + '.png" />';
}

let app = new Vue ({
    el: '#app',
    data: {
        argentina: bandeira('argentina'),
        brazil: bandeira('brazil'),
        china: bandeira('china'),
        uk: bandeira('uk'),
        usa: bandeira('usa')
    },
    methods: {
        paises:function() {     // função 'paises' se tornará um array
            return [
                {bandeira: this.brazil, continente: 'América do Sul'},
                {bandeira: this.argentina, continente: 'América do Sul'},
                {bandeira: this.china, continente: 'Asia'},
                {bandeira: this.uk, continente: 'Europa'},
                {bandeira: this.usa, continente: 'América do Norte'}
            ];
        }
    }
});