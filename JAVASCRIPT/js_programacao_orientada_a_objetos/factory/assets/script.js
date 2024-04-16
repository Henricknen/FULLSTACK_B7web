class Person {

    static technical_graduation = 2;

    constructor(name) {
        this.name = name;
    }
}

function createPerson(name, age) {      // função criará uma pessoa
    let p = new Person(name);       // cria um objeto 'p' com um nome
    p.age = age;        // 'setando' a age
    return p;       // retornando todo o objeto
}

let p1 = createPerson('Luis Henrique S. F.', 32);       // criando uma pessoa, é um objeto de 'Person'
console.log(`${p1.name} tem ${p1.age} anos`);