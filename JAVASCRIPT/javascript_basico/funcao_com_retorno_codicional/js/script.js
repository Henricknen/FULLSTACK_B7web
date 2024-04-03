function maiorIdade(idade) {        // função que verifica a idade
    if(idade >= 18) {
        return true;
    } else {
        return false;
    }
}

let idade = 20
let verificacao = maiorIdade(idade);        // passando valor da variável 'idade' para função 'maiorIdade' que retornará 'true' ou 'false'

if(verificacao) {       // condição, se o 'return' for 'true'
    console.log("É maior de idade...");
} else {        // se for 'false'
    console.log("É menor de idade...");
}