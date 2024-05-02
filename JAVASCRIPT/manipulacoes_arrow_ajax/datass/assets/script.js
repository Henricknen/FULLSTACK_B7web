let d = new Date();

let ano = d.getFullYear();        // 'getFullYear' pega somente o ano da data
console.log(ano);

let mes = d.getMonth();     // 'getMonth' pega o mês, atual (-1)
console.log(mes);

let dia_smn = d.getDay();        // 'getDay' retorna o dia da semana
console.log(dia_smn);

let dia = d.getDate();        // 'getDate' retorna o dia atual
console.log(dia);

let hora = d.getHours();        // 'getHours' retorna a hora
console.log(hora);

let minutos = d.getMinutes();        // 'getMinutes' retorna os minutos
console.log(hora);

let segundos = d.getSeconds();        // 'getSeconds' retorna os segundos
console.log(segundos);

let milisegundos = d.getMilliseconds();        // 'getMilliseconds' retorna os mili segundos
console.log(milisegundos);

let qtd_milise = d.getTime();       // 'getTime' retorna a quantidade de mili segundos desde de 1970 até o momento atul
console.log(qtd_milise);