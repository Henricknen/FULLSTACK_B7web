let hora = new Date();

hora.setDate(hora.getHours() + 24);     // aumentando 24 horas

let novaHora = hora;
console.log(novaHora);

// ----------------------------------------------------------------------------------

let dia = new Date();

dia.setDate(dia.getDate() + 5);     // ultilizando 'getDate' para aumentar 5 dias a mais em relação ao dia atual

let novoDia = dia;
console.log(novoDia);

// ----------------------------------------------------------------------------------

let ano = new Date();

ano.setFullYear(2060);        // definindo o ano para 2060

let novoAno = ano;
console.log(novoAno);