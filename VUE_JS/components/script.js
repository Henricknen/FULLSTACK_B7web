function bandeira(pais) {
    return '<img src = "paises/' + pais + '.png" />';
}

Vue.component("pais", {     // componente 'pais' com um objeto com varios itens
    props:['bandeira', 'continente'],       // 'props' é um array com a lista de propriedades
    template:`<p v-html = "bandeira + continente"></p>`      // 'template' é o resultado final
});

let app = new Vue ({
    el: '#app',
    data: {
        argentina: bandeira('argentina'),
        brazil: bandeira('brazil'),
        china: bandeira('china'),
        uk: bandeira('uk'),
        usa: bandeira('usa')
    }
});