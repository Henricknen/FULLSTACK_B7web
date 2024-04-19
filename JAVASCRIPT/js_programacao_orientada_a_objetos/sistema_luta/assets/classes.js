class Log {
    list = [];

    constructor(listEl) {
        // this.list = [];      // array 'list'
        this.listEl = listEl;
    }

    addMessage(msg) {
        this.list.push(msg);        // adicionando 'mensagem' no array list
        this.render();
    }

    render() {      // função de renderização, transforma o que está na lista em visual
        this.listEl.innerHTML = '';

        for(let i in this.list) {
            this.listEl.innerHTML += `<li>${this.list[i]}</li>`;
        }
    }
}

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

class Stage {      // classe do cenário
    constructor(fighter1, fighter2, fighter1El, fighter2El, logObject) {
        this.fighter1 = fighter1;       // lutador
        this.fighter2 = fighter2;
        this.fighter1El = fighter1El;       // elemento geral do lutador
        this.fighter2El = fighter2El;
        this.log = logObject;
    }

    start() {       // função que dará um início no jogo
        this.update();

        this.fighter1El.querySelector('.attackButton').addEventListener('click', ()=> this.doAttack(this.fighter1, this.fighter2));       // evento de ataque
        this.fighter2El.querySelector('.attackButton').addEventListener('click', ()=> this.doAttack(this.fighter2, this.fighter1));
    }

    update() {      // função atualizará a tela com informações dos dois lutadores
        this.fighter1El.querySelector('.name').innerHTML = `${this.fighter1.name} - ${this.fighter1.life.toFixed(1)} HP`;
        let f1Pct = (this.fighter1.life / this.fighter1.maxLife) * 100;     // pegando a porcentagem de vida em relação à vida máxima
        this.fighter1El.querySelector('.bar').style.width = `${f1Pct}%`;
        
        this.fighter2El.querySelector('.name').innerHTML = `${this.fighter2.name} - ${this.fighter2.life.toFixed(1)} HP`;
        let f2Pct = (this.fighter2.life / this.fighter2.maxLife) * 100;
        this.fighter2El.querySelector('.bar').style.width = `${f2Pct}%`;
    }

    doAttack(attracking, attacked) {        // função de ataque recebendo dois parâmetros: quem está atacando 'attracking' e quem está sendo atacado 'attacked'
        if(attracking.life <= 0 || attacked.life <= 0) {
            this.log.addMessage(`Adversário finalizado...`);        // se a vida de qualquer um dos personagens for menor que 0, aparecerá essa mensagem
            return;
        }

        let attackFactor = (Math.random() * 2).toFixed(2);
        let defenseFactor = (Math.random() * 2).toFixed(2);

        let actualAttack = attracking.attack * attackFactor;        // força de ataque nova
        let actualDefense = attacked.defense * defenseFactor;

        if(actualAttack > actualDefense) {
            attacked.life -= actualAttack;      // quando o ataque for maior que a defesa, a vida de quem está sendo atacado será reduzida
            this.log.addMessage(`${attracking.name} causou ${actualAttack.toFixed(2)} de dano em ${attacked.name}`);
        } else {
            this.log.addMessage(`${attacked.name} conseguiu se defender...`);
        }

        this.update();
    }
}

// const log = new Log(document.querySelector('.log')); // inicializando o objeto Log
