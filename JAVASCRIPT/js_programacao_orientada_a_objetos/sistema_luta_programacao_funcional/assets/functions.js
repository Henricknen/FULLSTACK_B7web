const defaultCharacter = {      // personagem padrão, que será ultilizado como modelo
    name: '',
    life: 1,
    maxLife: 1,
    attack: 0,
    defense: 0
}

const createKnight = (name) => {     // criando o personagem 'cavalheiro'
    return {        // retona um objeto
        ...defaultCharacter,        // fazendo 'herança', herdando as propriedades do personagem padrão
        name,       // é possível inserir o nome deste personagem
        life: 100,
        maxLife: 100,
        attack: 10,
        defense: 8
    }
}

const createSorcerer = (name) => {      // personagem 'feiticeiro'
    return {
        ...defaultCharacter,
        name,
        life: 50,
        maxLife: 50,
        attack: 14,
        defense: 3
    }    
}

const createLittleMonster = () => {      // personagem 'pequeno mostro'
    return {
        ...defaultCharacter,
        name: 'Little Monster',     // inserindo um nome fixo neste personagem
        life: 40,
        maxLife: 40,
        attack: 4,
        defense: 4
    }    
}

const createBigMonster = () => {      // personagem 'grande mostro'
    return {
        ...defaultCharacter,
        name: 'Big Monster',     // inserindo um nome fixo neste personagem
        life: 120,
        maxLife: 120,
        attack: 16,
        defense: 6
    }    
}