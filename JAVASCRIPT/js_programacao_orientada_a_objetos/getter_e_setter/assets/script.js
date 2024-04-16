class Person {

    _age = 0;       // variável _age equivale à idade
    steps = 0;

    constructor(firstName, lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }

    takeAStep() {       // função 'takeAStep' executa uma ação de dar um passo
        this.steps++;       // referênciando p1, p2 e p3
    }

    get fullName() {        // 'get' retornará o nome completo 
        return `${this.firstName} ${this.lastName}`;
    }

    get age() {
        return this._age;       // retornando idade
    }

    set age(x) {        // método 'set' atribuindo um valor a propriedade '_age'
        if(typeof x === 'number') {     // verificando se valor atribuindo é um numero
            this._age = x;
        }
    }

}

let p1 = new Person("Luis", "Henrique");
let p2 = new Person("Silva", "Ferreira");
let p3 = new Person("Pedro");

p1.age = 32;
console.log(`${p1.fullName}  tem ${p1.age} anos.`);