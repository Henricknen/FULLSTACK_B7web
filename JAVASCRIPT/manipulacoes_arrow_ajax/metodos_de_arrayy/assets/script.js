let hardskill = ['python', 'php', 'javascript', 'laravel', 'sql', 'git', 'html', 'css'];     // array 'hardskill'
let front_end = ['html', 'css', 'javascript'];
let back_end = ['python', 'php', 'javascript', 'sql'];

hardskill.splice(1, 1);        // 'splice' é ultilizado para remover itens da lista, sendo neçessario passar o indiçe do item que será removido e quantidade de itens que será removidos, como parâmetros 
let res = hardskill;
console.log(res);


let fullstack = front_end.concat(back_end);     // método 'concat' concantena arrays
console.log(fullstack);


front_end.sort();       // sort ordena o array em ordem 'crescente'
console.log(front_end);

back_end.reverse();         // reverse ordena o array em ordem 'decrescente'
console.log(back_end);



