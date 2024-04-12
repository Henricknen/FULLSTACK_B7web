function clicou() {
    const especializacoes = document.querySelector('#tecnico');
    const ul = especializacoes.querySelector('ul');        // seleçionando elemento filho 'ul'
    
    const newButton = document.createElement('button');     // criação do botão
    newButton.innerHTML = "visualizar";     // conteúdo do botão

    ul.after(newButton);        // adiçionando botão depois do elemento 'ul'
    
}