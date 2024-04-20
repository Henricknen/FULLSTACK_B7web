let person = {
    name: 'Luis',
    lastname: 'Henrique',
    age: 33,
    getFullName() {     // criando função sendo propriedade, ela tem acesso ao objeto 'this'
        return `${this.name} ${this.lastname}`;
    }
}

console.log(person.getFullName());