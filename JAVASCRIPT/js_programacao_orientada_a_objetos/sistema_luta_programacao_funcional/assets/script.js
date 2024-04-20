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

// ------------------------------ herança ---------------------------------------------------

const defaultUser = {       // modelo 'gerenalista'
    name: '',
    email: '',
    level: 1
}

let User1 = {       // usuário comum
    ...defaultUser,     // clonando objeto 'defaultUser'
    name: 'Luis Henrique',
    email: 'l.henrick@live.com'
}

let Adm = {     // usuário 'administrador'
    ...defaultUser,
    name: 'Full Stack',
    email: 'l.henrick@hotmail.com',
    level: 2        // alterando o 'level'
}

console.log(Adm);



