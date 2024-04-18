class Character {       // classe de 'personagem' padrão

    _life = 1;
    maxLife = 1;
    attack = 0;
    defense = 0;

    constructor(name) {
        this.name = name;
    }

    get life() {
        return this._life;
    }

    set life(newLife) {
        this._life = newLife < 0 ? 0 : newLife;
    }
}

class Knight extends Character {        // classe de caracteristica do personagem  'knight'
    constructor(name) {
        super(name);        // 'super' acessa o constructor do Character e define um 'name'
        this.life = 100;        // caracteristicas proprias do guerreiro
        this.attack = 10;
        this.defense = 8;
        this.maxLife = this.life;
    }
}

class Sorcerer extends Character {        // classe de caracteristica do personagem  'Sorcerer'
    constructor(name) {
        super(name);
        this.life = 80;
        this.attack = 15;
        this.defense = 3;
        this.maxLife = this.life;
    }
}

class LittleMonster extends Character {        // classe de caracteristica do personagem  'LittleMonster'
    constructor() {
        super('Little Monster');
        this.life = 40;
        this.attack = 4;
        this.defense = 4;
        this.maxLife = this.life;
    }
}

class BigMonster extends Character {        // classe de caracteristica do personagem  'BigMonster'
    constructor() {
        super('Big Monster');
        this.life = 120;
        this.attack = 16;
        this.defense = 6;
        this.maxLife = this.life;
    }
}

class Stage {      // classe do cénario
    constructor(fighter1, fighter2, fighter1El, fighter2El) {
        this.fighter1 = fighter1;       // lutador
        this.fighter2 = fighter2;
        this.fighter1El = fighter1El;       // elemento geral do lutador
        this.fighter2El = fighter2El;
    }

    start() {       // função que dará um iniçio no jogo
        this.update();
    }

    update() {      // função atualizará a tela com informações dos dois lutadores
        this.fighter1El.querySelector('.name').innerHTML = this.fighter1.name;
        
        this.fighter2El.querySelector('.name').innerHTML = this.fighter2.name;
    }
}