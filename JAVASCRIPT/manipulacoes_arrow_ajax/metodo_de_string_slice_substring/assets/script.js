let programacao = 'fullstack';
let front_end = 'html, css, javacript';
let back_end = 'python, php, javacript, sql';

let prog = programacao.slice(0, 9);      // 'slice' reçebe dois parâmetros o primeiro é a possição iniçial e o segundo a possíção final
console.log(prog);

let front = front_end.substring( -0, -17);         // 'substring' diferentemene do 'slice' não permite iniçiar do fim da string '-11, -35'
console.log(front);