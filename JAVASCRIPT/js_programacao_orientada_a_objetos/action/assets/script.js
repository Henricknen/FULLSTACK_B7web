class Person {

    age = 0;
    steps = 0;      // variável 'steps' são os passos de uma pessoa

    constructor(name) {
        this.name = name;
    }

    takeAStep() {       // função 'takeAStep' executa uma ação de dar um passo
        this.steps++;       // referênciando p1, p2 e p3
    }

    setAge(newAge) {        // setando a idade
        if(typeof newAge === 'number') {
            this.age = newAge;
        }
    }
}

let p1 = new Person("João");
let p2 = new Person("Maria");
let p3 = new Person("Pedro");

p1.setAge(20);
p1.takeAStep();                                                           // A
p1.takeAStep();                                                           // Ç
console.log(`${p1.name} deu ${p1.steps} passos e tem ${p1.age} anos.`);   // Ã
console.log(`Passos de ${p2.name}: ${p2.steps}`);                         // O