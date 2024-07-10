function perfil(usuario: {nome: string, idade?: number, programador: string}) {    // o símbolo '?' depois da propriedade 'idade' indica que a propriedade é opcional
    if(usuario.idade !== undefined) {        // se 'idade' estiver definida.
        return `Me chamo ${usuario.nome}, tenho ${usuario.idade} anos e sou um programador ${usuario.programador}`;       // será retornada essa linha de código, incluindo a idade.
    } else {        // se 'idade' não estiver definida
        return `Me chamo ${usuario.nome} e sou um profissional ${usuario.programador}`;       // será retornada essa linha de código, sem a idade.
    }
}

let u = {
    nome: 'Luis Henrique S F',
    // idade: 99,
    programador: 'FullStack'
};

perfil(u);  // chama a função 'perfil' com o objeto 'u'
