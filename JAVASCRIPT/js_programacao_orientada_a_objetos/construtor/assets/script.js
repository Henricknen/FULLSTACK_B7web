let person = {      // definindo objeto 'person'
    name: 'Luis',
    lastName: 'Henrique',
    age: 32,

    getFullName() {         // método 'getFullName' que retorna o nome completo
        return `${this.name} ${this.lastName}`;
    },

    program() {         // método 'program' que imprime uma mensagem indicando a programação que está sendo executada
        console.log('Codifica JavaScript');
    }
}

console.log(person.getFullName());

person.program();
