let nome = 'Luis Henrique S F';     // variável

// let formacao = ['Pós Desenvolvimento web', 'Graduação Análise e desenvolvimento de sistemas', 'Técnico em Informática para internet', 'Técnico em Eletroeletrônica', 'Curso profinalizante Programador Front-End'];     // array

let profissional = {     // definição de um objeto chamado 'profissional'
    frontend: 'html, css, javascript',      // propriedade 'frontend' que lista as habilidades relacionadas ao desenvolvimento front-end
    backend: 'python, php, sql, javascript',
    fullstack: 'html, css, javascript, python, php, sql, laravel, angular',
    formacao: ['Pós Desenvolvimento web', 'Graduação Análise e desenvolvimento de sistemas', 'Técnico em Informática para internet', 'Técnico em Eletroeletrônica', 'Curso profinalizante Programador Front-End']     // 'inserindo' array dentro do objeto
}

console.log(profissional);       // exibindo o objeto profissional no console

console.log(profissional.fullstack);     // o '.' permite exibir um item espeçifico 

console.log(`Me chamo ${nome} e tenho conheçimento em ${profissional.fullstack} e tenho formação em ${profissional.formacao}`);