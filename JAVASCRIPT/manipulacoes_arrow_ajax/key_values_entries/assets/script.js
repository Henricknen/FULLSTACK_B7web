let back_end = ['javascript', 'php', 'python', 'sql'];
console.log(Object.keys(back_end));     // 'Object.keys' pega as indiçes do array

// -------------------------------------------------------------------------------------

let front_end = ['javascript', 'css', 'html'];
console.log(Object.entries(front_end));     // 'Object.entries' cria um array contendo dois intens, um 'indiçe' e o 'valor' do indiçe

// -------------------------------------------------------------------------------------

let automacao = {        // objeto 'automacao'
    residencial: 'Arduino',
    predial: 'CLP'
}

console.log(Object.keys(automacao));

// -------------------------------------------------------------------------------------

let profissional = {
    nome: 'Luis Henrique S. F.',
    programador: 'FullStack',
    idade: 99
}

console.log(Object.values(profissional));       // 'Object.values' pega os valores que se gravado no objeto