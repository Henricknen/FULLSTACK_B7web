class Person {

    _age = 0;       // variável 'age'

    constructor(name) {
        this.name = name;
    }
    
    profissional() {        // função 'profissional'
        console.log(`${this.name} é o proprietário desse GitHub`);
    }
}

class Student extends Person {      // classe 'Student' herda as caracteristicas de 'Person'
    constructor(name, id) {
        super(name);    // 'super' se refere a classe que está sendo estendida 'Person' 
        this.id = id;       // 'this' faz referência ao proprio 'Student'
    }

    profissional() {        // 'sobreescrevendo' a função profissional
        console.log(`${this.name} codifica tanto front end quanto back end...`);
    }
}

let p1 = new Student("Luis Henrique S F", 1);
p1.age = 32;

p1.profissional();      // chamando a função  profissional que foi criada em 'Person'