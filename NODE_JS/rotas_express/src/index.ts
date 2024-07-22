let nome: string = "Luis Henrique S F";
let profissao: string = "FullStack";
let token: string = process.env.GOOGLE_DRIVE_TOKEN as string;

console.log(`Me chamo ${nome} e sou programador ${profissao}`);
console.log(`Conectando no Drive com o TOKEN: ${token}`);