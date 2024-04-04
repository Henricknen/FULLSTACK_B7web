// declaração das funções
const profissionalFrontEnd = pro => pro + " front end";      // função arrow function 'profissionalFrontEnd' '=>' esse símbolo indica que é uma arrow function

const profissionalBackEnd = pro => pro + " back end";           // 'back end' é o retorno da função profissional

const profissionalFullStack = pro => pro + " full stack";

console.log(profissionalFrontEnd('Programador'));       // chamando a função profissionalFrontEnd com o argumento 'Programador' e imprime o resultado no console
console.log(profissionalBackEnd('Programador'));
console.log(profissionalFullStack('Programador'));
