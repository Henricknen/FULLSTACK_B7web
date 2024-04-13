function clicou() {
    const button = document.querySelector('button');

    button.classList.add('verde');      // adiçionando classe 'verde' ao botão
    button.classList.remove('azul');        // removendo a classe 'azul' do botão

    button.classList.toggle('amarelo');         // 'toggle' se a classe não existir ele 'adiçiona' se existir ele 'remove'

    console.log(button.classList);      // 'classList' retorna um array chamado 'DOMTokenList' que contém métodos que verifica a presença de classes em um elemento
}