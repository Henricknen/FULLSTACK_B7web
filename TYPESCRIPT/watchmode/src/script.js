var profissional = 'Luis Henrique S. F.'; // declaração de uma constante chamada profissional do tipo string
/*
Para compilar o arquivo TypeScript em JavaScript usando o terminal:

Comando único:
tsc src/script.ts

--------------------------------------------------------------------------------------------

Para usar o 'watchMode' 'modo de observação' e compilar automaticamente quando houver alterações:

Comando com --watch:
tsc src/script.ts --watch

*/
function codificando(linguagem_de_programacao) {
    return 'Estou codificando em: ' + linguagem_de_programacao;
}
console.log(codificando('TypeScript')); // uso da função codificando com TypeScript como argumento
