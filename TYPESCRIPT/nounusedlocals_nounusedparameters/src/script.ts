const botao = document.querySelector('button') as HTMLButtonElement;        // botao selecionando o elemento 'button' e 'HTMLButtonElement' espeçifica o item html que virá
botao.addEventListener('click', ()=> {      // evento de 'click' do botão
    console.log('clicou!');
});