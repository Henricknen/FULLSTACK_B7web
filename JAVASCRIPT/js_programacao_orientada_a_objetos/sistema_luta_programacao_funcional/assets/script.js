function createPerson(name, lastname, age) {
    return {
        name,
        lastname,
        age
    }
}

let person1 = createPerson('Luis', 'Henrique', 33);
let person2 = createPerson('Front End', 'Back End', 100);

console.log(person1.name);