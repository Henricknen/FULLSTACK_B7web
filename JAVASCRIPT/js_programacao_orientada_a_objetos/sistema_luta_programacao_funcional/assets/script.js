let person = {
    name: 'Luis',
    lastname: 'Henrique',
    age: 33,
    getFullName() {
        return `${this.name} ${this.lastname}`;
    },
    graduacao() {
        console.log('Sou formado em Anánilise e desenvolvemento de sistemas');
    }
}

person.graduacao();     // antes de executar qualquer coisa tem que chamar a funcao graduação que 'substitui' o construtor

console.log(person.getFullName());
