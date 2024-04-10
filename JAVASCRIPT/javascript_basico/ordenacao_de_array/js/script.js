let hardskill = ['php', 'javascript', 'sql', 'laravel', 'python', 'github'];

hardskill.reverse();        // 'reverse' inverte o array 
console.log(hardskill);

hardskill.sort();       // 'sort' deixa o array em ordem alfabética
console.log(hardskill);

let formacao = [        // array de objetos formacao
{graduacao: 'Análise e desenvolvimento de sistemas', ano:2023},
{tecnico: 'Eletroeletrônica', ano:2021},
    {tecnicoo: 'Informática para internet', ano:2022},
]

formacao.sort((a, b)=> {        // função 'arrow function' faz a verificação de qual item fica na frente de qual item
    if(a.ano > b.ano) {
        return 1;
    } else if(a.ano < b.ano) {
        return -1;
    } else {
        return 0;
    }
});

console.log(formacao)