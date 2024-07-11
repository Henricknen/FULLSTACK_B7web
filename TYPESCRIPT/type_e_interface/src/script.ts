// type User = {       // criando um 'type' proprio chamado 'User' que será um objeto
//     nome: string,
//     idade: number
// };

interface User {       // 'interface' é semelhante ao 'type'
    nome: string;
}

interface User {        // mas 'interface' é possível adicionar mais itens
    idade: number;
}

function resumo(usuario: User) {        // utilizando o 'type' criado no parâmetro da função
    return `Me chamo ${usuario.nome}, e tenho ${usuario.idade} anos`;
}

resumo({
    nome: 'Luis Henrique S F',
    idade: 99
});