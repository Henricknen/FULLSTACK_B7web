function alerta() {     // função alerta será executada depois de um determinado tempo
    console.log('Função acionada');
}

let nome = 'Luis Henrique S F';
setTimeout(alerta, 2000);       // 'setTimeout' executa a função 'alerta' depois de 2 segundos
let codificando = 'javascript';
console.log('Meu nome é:  ' + nome + ' estou codificadando: ' + codificando);       // código assincrono será executado antes da função