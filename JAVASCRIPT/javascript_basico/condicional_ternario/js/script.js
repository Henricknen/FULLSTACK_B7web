let isMember = true;        // variável 'bolean'
let shipping = (isMember ? 2 : 10);      // '?' indica que é uma condição ternária
                    // true : false

console.log(isMember ? 'Voçê é membro' : 'Voçê não é membro');
console.log("Frete: " + shipping);

// -----------------------------------------------------------------------------------------

let age = 90;

let isAdult = (age >= 18 ? true : false);

console.log(isAdult);