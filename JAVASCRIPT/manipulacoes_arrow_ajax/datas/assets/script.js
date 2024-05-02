let d = new Date();     // criação de um objeto da classe 'Date'

console.log(d);     // retorna uma data completa incluindo dia, mês, hora, minutos, segundos e fuso horário

console.log(d.toDateString());      // retorna uma representação resumida da data contendo apenas dia, mês e ano

console.log(d.toUTCString());       // retorna a data e hora em formato UTC (Tempo Universal Coordenado)

// ------------------------------------------------------------------------------------------------------------

// criando um objeto da classe 'Date' com informações específicas
let da = new Date(2024, 4, 2, 9, 46, 12); // (ano, mês, dia, hora, minuto, segundo)

console.log(da.toString());     // retorna uma representação de string da data e hora no fuso horário local
