import { z } from 'zod';

const person = z.object({       // padrão 'person'
    name: z.string(),
    age: z.number()
});

const employee = z.object({     // padrão 'employee'
    role: z.string()        // role 'papel' do empregado
});

// const employeePerson = person.and(employee);          // utilizando padrão 'employeePerson' para person e para employee
const employeePerson = z.intersection(person, employee);     // padrão 'employeePerson' utilizando 'intersection' para fazer uma interseção

const result = employeePerson.parse({ 
    name: 'Joao',
    age: 100,
    role: 'developer'
});

console.log(result);