class Person {

    static technical_graduation = 2;        // variável estatica 

    constructor(name) {
        this.name = name;
    }

    training() {        // método 'training'
        console.log(`Ola, meu nome é ${this.name} e tenho ${Person.technical_graduation} formação tecnica...`);      // 'this' faz referência ao objeto 'p1' e 'Person' faz referência a uma 'Person' pessoa
    }

    static graduation() {       // método 'static' é indepedente de qualquer objeto
        console.log(`Analise e desenvolvimento de sistemas`);
    }
}

let p1 = new Person("Luis Henrique S. F.");       // criação do objeto p1 chamado de 'Luis Henrique S F'
p1.training();      // chamando método 'training'

Person.graduation();        // chamando método estatico 'graduation' que está dentro da classe 'Person' 