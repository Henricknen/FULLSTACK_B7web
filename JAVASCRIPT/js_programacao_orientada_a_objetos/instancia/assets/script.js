class Person {      // classe

    age = 0;        // idade é por padrão 0 

    constructor(name) {
        this.name = name;       // this faz referênçia ao proprio objeto
    }
}

let p1 = new Person("João");        // instançiando uma pessoa p1
let p2 = new Person("Maria");
let p3 = new Person("Pedro");

p1.age = 18;        // 'alterando' idade de p1

console.log(`${p1.name} tem ${p1.age} anos`);
console.log(`${p2.name} tem ${p2.age} anos`);
console.log(`${p3.name} tem ${p3.age} anos`);