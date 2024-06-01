let placar = new Vue({
    el: '#placar',
    data: {
        n:0,
        aparecer: true      // se variável for true mostrará  a frase do elemento que conter ela como parâmetro em 'v-if'
    }
});

let lista = new Vue({
    el: '#lista',
    data: {
        hardskills: [       // array 'hardskills' contém algumas tecnologias que ultilizo
            {liguagem_de_programacao: 'javascript', framework: 'vue.js'},
            {liguagem_de_programacao: 'php', framework: 'laravel'},
            {liguagem_de_programacao: 'python', framework: 'django'},
        ]
    }
});