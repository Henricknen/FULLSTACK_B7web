function clicou() {
    const input = document.querySelector('input');
    
    console.log(input.getAttribute('type'));        // atráves do 'getAttribute' é possível pegar os atributos

    if(input.hasAttribute('placeholder')) {      // 'hasAttribute' verifica se existe o atributo
        console.log('Tem placeholder SIM');
    } else {
        console.log('Não tem placeholder');
    }

    const botao = document.querySelector('.botao');

    if(input.getAttribute('type') === 'text') {     // pegando o que está no atributo 'type' e se for 'text'
        input.setAttribute('type', 'password');         // altera para 'password'
        botao.innerHTML = "Mostrar senha";                  // e mostrará o botão com esse descrição
    } else {
        input.setAttribute('type', 'text');
        botao.innerHTML = "Ocultar senha";
    }
}