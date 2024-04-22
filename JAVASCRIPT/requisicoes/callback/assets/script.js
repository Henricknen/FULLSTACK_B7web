function clickCallback() {      // função 'clickCallback'
        alert("O botão foi clicado...");
};

document.querySelector('.botao')
        .addEventListener('click', clickCallback);      // evento de click executa a função 'clickCallback'