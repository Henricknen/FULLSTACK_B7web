function calcPct(n1, n2) {
    let pct = (n2 / n1) * 100;      // cálculo da porcentagem
    return pct;     // retornando a variável 'pct' que armazenará o resultado
}

let x = 50;
let y = 25;
let pct = calcPct(x, y);
console.log(`${pct}% de ${x} é ${y}`);