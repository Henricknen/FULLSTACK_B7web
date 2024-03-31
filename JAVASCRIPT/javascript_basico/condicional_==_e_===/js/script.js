let idade = "32";       // variável idade armazenando uma string "20"

if(idade == 32) {       // verificando se idade for igual a number 20, '==' faz uma verificação não tão rigoroza 'o tipo' da variável ou da condição 'não importa' se os valores forem iguais tanto da 'string' quanto o do 'number' funçionará
    console.log("Eu já tenho 32 anos");
}

let ano = 2024;

if(ano === 2024) {       // '===' é mais restritivo o 'tipo' do valor da variável deve ser igual o tipo da condiçional
    console.log("Essa codificação foi feita em 2024");
}