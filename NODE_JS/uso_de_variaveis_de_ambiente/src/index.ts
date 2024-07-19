let nome: string = "Luis Henrique Silva Ferreira";
let profissional: string = "FullStack";
let ano: number = 2024;
let token: string = process.env.GOOGLE_DRIVE_TOKEN as string;

console.log(`Meu nome é ${nome} e eu sou um profissional ${profissional} está codificação foi feita no ano de ${ano}.`);
console.log(`Conectando ao Drive com o TOKEN: ${token}`);