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

const stage = {
    fight1: null,
    fight2: null,
    fight1El: null,
    fight2El: null,

    start(fight1, fight2, fight1El, fight2El) {
        this.fight1 = fight1;
        this.fight2 = fight2;
        this.fight1El = fight1El;
        this.fight2El = fight2El;

        this.fight1El.querySelector('.attackButton').addEventListener('click', () => this.doAttack(this.fight1, this.fight2));
        this.fight2El.querySelector('.attackButton').addEventListener('click', () => this.doAttack(this.fight2, this.fight1));

        this.update();
    },
    update() {
        this.fight1El.querySelector('.name'). innerHTML = `${this.fight1.name} - ${this.fight1.life.toFixed(1)} HP`;
        let f1Pct = (this.fight1.life / this.fight1.maxLife) * 100;
        this.fight1El.querySelector('.bar'). style.width = `${f1Pct}%`;
        
        this.fight2El.querySelector('.name'). innerHTML = `${this.fight2.name} - ${this.fight2.life.toFixed(1)} HP`;
        let f2Pct = (this.fight2.life / this.fight2.maxLife) * 100;
        this.fight2El.querySelector('.bar'). style.width = `${f2Pct}%`;
    },
    doAttack(attacking, attacked) {

    }
}