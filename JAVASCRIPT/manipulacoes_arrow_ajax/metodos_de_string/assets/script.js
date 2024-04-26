let linguagem = 'JavaScript';
let framework_front = 'Vue.js';
let framework_back = 'Express.js, Koa.js, Nest.js';
let tipo = '    front_end_e_back_end   ';

let codificando = 'Linguagem de programação ?';
console.log(codificando);

let codificando_agora = codificando.replace('?', 'JavaScript');       // função 'replace' substituíra a parte da string no 'primeiro do parâmetro' por 'JavaScript'
console.log(codificando_agora);

let caracter_grandes = codificando_agora.toUpperCase();      // 'toUpperCase' converte todos os caracteres da string em letras maiúsculas
console.log(caracter_grandes);

let caracter_pequenos = codificando.toLowerCase();      // 'toLowerCase' faz o contrário de toUpperCase e converte os caracteres em minúsculos
console.log(caracter_pequenos);

let framework_f = framework_front.concat(' ', 'é um framework front end');     // 'concat' concatena informações
console.log(framework_f);

let framework_b = framework_back + ' são frameworks back end';      // concatenando ultilizando operador de adição '+'
console.log(framework_b);

let tipo_da_liguagem = tipo.trim().length;     // função 'remove' os espaços, 'length' conta a quantidade de caracteres que a string tem
console.log('Quantidade de caracteres da string ' + tipo_da_liguagem);

let char = linguagem.charAt(4);      // 'charAt' mostra qual é o caracter que está no possição 4 da string
console.log(char);

let array = framework_back.split(', ');     // 'split' transforma a string em um array
console.log(array);