function perfil(usuario: {nome: string, idade: number, programador: string}) {      // função 'perfil' reçebendo um objeto 'usuario' com suas propriedades e seus respectivos 'types'
    return `Me chame ${usuario.nome} sou um programador ${usuario.idade} sou um profissional ${usuario.programador}`;
}

let u = {    // objeto 'u' representa um usuário com as propriedades nome, idade e programador
    nome: 'Luis Henrique S F',
    idade: 99,
    programador: 'FullStack'
};

perfil(u);