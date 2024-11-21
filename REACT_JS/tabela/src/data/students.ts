import { Student } from "@/types/Student";

export const students: Student[] = [        // exportando a constante 'students' que é um array 'Student' com dados de 'pessoas fictícias'
    {
        id: 1,
        active: true,
        name: 'Fulano de Tal',
        email: 'fulano@escola.com.br',
        avatar: 'https://images.unsplash.com/photo-1547037579-f0fc020ac3be?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHJvc3RvfGVufDB8MHwwfHx8Mg%3D%3D&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        grade1: 7.3,
        grade2: 8.1
    },
    {
        id: 2,
        active: true,
        name: 'Ciclano Silva',
        email: 'ciclano.silva@escola.com.br',
        avatar: 'https://images.unsplash.com/photo-1601233749202-95d04d5b3c00?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjN8fHJvc3RvfGVufDB8MHwwfHx8Mg%3D%3D&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        grade1: 2.9,
        grade2: 8.7
    },
    {
        id: 3,
        active: false,
        name: 'Beltrano Matheus',
        email: 'beltrano.matheus@escola.com.br',
        avatar: 'https://images.unsplash.com/photo-1474176857210-7287d38d27c6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjZ8fHJvc3RvfGVufDB8MHwwfHx8Mg%3D%3D&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        grade1: 8.3,
        grade2: 6.4
    },
    {
        id: 4,
        active: true,
        name: 'Zuflano Caxias',
        email: 'zuflano.caxias@escola.com.br',
        avatar: 'https://images.unsplash.com/photo-1601576084861-5de423553c0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzF8fHJvc3RvfGVufDB8MHwwfHx8Mg%3D%3D&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        grade1: 9,
        grade2: 8.1
    },
    {
        id: 5,
        active: true,
        name: 'Turano Pires',
        email: 'turano.pires@escola.com.br',
        avatar: 'https://images.unsplash.com/photo-1564564244660-5d73c057f2d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDN8fHJvc3RvfGVufDB8MHwwfHx8Mg%3D%3D&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        grade1: 10,
        grade2: 9.7
    },
    {
        id: 6,
        active: false,
        name: 'Voltano Augusto',
        email: 'voltano.augusto@escola.com.br',
        avatar: 'https://images.unsplash.com/photo-1611689037241-d8dfe4280f2e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzN8fHJvc3RvfGVufDB8MHwwfHx8Mg%3D%3D&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        grade1: 5.5,
        grade2: 6.2
    }
];