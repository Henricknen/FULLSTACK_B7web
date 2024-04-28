let hardskill = ['python', 'php', 'javascript', 'laravel', 'sql', 'git'];     // array 'hardskill'
let res = hardskill.toString();     // método 'toString' transforma o array em uma string separada por virgulas
console.log(res);

let ress = hardskill.join('-');     // 'join' transforma em string separando pelo parâmetro espeçificado 
console.log(ress);

let resss = hardskill.indexOf('javascript');      // 'indexOf' mostra a posição do item passado como parâmetro
console.log(resss);

hardskill.pop();        // 'pop' remove o último item da lista
let remocao = hardskill;
console.log(remocao);
