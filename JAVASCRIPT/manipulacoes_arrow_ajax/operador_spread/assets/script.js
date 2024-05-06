let numeros = [1, 2, 3, 4, 5, 6];       // array 'números' contendo 5 indiçes
let continuacao = [...numeros, 7, 8, 9, 10];     // '...numeros' é o array completo de 'números'

console.log(continuacao);

// -----------------------------------------------------------------------------------------------

let profissional = {
    nome: 'Luis Henrique S. F.',
    programador: 'fullstack',
    idade: 99
};

let perfil_completo = {     // função retorna toda informação do profissional
    ...profissional,
    cidade: 'Martinópolis',
    estado: 'SP',
    pais: 'Brasil'
};

console.log(perfil_completo);

// -----------------------------------------------------------------------------------------------

function hardskills(programa) {     // definição da função hardskills, que recebe um objeto 'programa' como parâmetro
    let linguagens = {
        ...programa,        // usando o operador spread para copiar todas as propriedades do objeto programa
        linguagem: 'javascript',    // adicionando duas novas propriedades: linguagem com valor 'javascript' e framework com valor 'node js'
        framework: 'node js'
    };

    return linguagens;      // retornando o objeto linguagens modificado
}

console.log(hardskills({framework_front: 'vue.js'}))        // chamando a função 'hardskills' com um objeto como argumento, que possui a propriedade 'framework_front' com valor 'vue.js'