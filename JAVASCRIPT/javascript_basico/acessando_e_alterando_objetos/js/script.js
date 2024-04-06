let profissional = {
    nome: 'Luis Henrique',
    hardskills: [       // array 'hardskills'
        {frontend: 'html, css, javascript'},        // objeto dentro do array
        {backend: 'python, php, sql, javascript'}
    ],
    // 'html, css, javascript, python, php, sql, laravel, angular',
    
    
    formacao: [ 'Graduação Análise e desenvolvimento de sistemas', 'Técnico em Informática para internet', 'Técnico em Eletroeletrônica', 'Curso profinalizante Programador Front-End']
}

profissional.nome = 'Luis Henrique Silva Ferreira';       // 'profissional.nome' acessa a propriedade nome, '=' define e 'Luis Henrique Silva Ferreira' é o nome alterado de profissional
console.log('Meu nome completo é: ', profissional. nome);

console.log(profissional. formacao);     // exibindo propriedade antes do incremento
profissional. formacao. push('cursando Pós Desenvolvimento web');     // incrementando a propriedade que é basicamente um array chamado de 'formacao' ultilizando push
console.log(profissional. formacao);         // exibição após a incrementação

console.log(profissional. hardskills[0]. frontend);     // 'acessando' objeto 'frontend' que está dentro o array 'hardskils' que está dentro do objeto 'profissional'