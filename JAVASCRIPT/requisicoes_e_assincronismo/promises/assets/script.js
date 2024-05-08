function pegar_temperatura() {      // função para obter a temperatura, retorna uma promise
    return new Promise(function(resolve, reject) {   // criação de uma nova promise com duas funções de callback, resolve e reject
        console.log('Pegando temperatura...');

        setTimeout(function() {     // simula um atraso de 2 segundos antes de resolver a promise
            resolve('40 graus');        // função 'resolve' é chamada quando a operação é bem-sucedida, passando '40 graus' como resultado
        }, 2000);
    });
}

let temp = pegar_temperatura();     // chamando a função para obter a temperatura e armazenando a promise resultante em 'temp'
temp.then(function(resultado) {         // o método 'then' é usado para lidar com o sucesso da promise, recebe o resultado da promise como argumento
    console.log('Temperatura: ' + resultado);   // exibe o resultado obtido
});
temp.catch(function(error) {        // o método 'catch' é usado para lidar com erros durante a execução da promise
    console.log('Erro ao obter a temperatura');   // exibe uma mensagem de erro caso ocorra algum problema
});
