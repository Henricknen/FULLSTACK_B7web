function clicou() {
    const cursando = document.querySelector('#pos');      // seleçionando elemento de 'id' pos
    const ul = cursando.querySelector('ul');        // seleçionando elemento filho 'ul'
    
    ul.children[0].append(" (cursando)");       // função 'append' adiçiona um conteúdo
    
    let curso = document.createElement("pós");      // criando elemento 'curso'
    curso.innerText = "Pós graduação";      // elemento no memória com um texto 'pós graduação'
    
    ul.appendChild(curso);      // função 'appendChild' adiçiona no final
    
}