function clicou() {
    const teste = document.querySelector('#graduacao');      // seleçionando elemento de 'id' graduacao
    console.log(teste);     // imprimindo no console o elemento de id 'graduacao'
    console.log(teste.children);        // 'children' imprime os filhos do elemento

    const ul = graduacao.querySelector('ul');

    console.log(ul.innerHTML);      // 'innerHTML' mostra o texto que está dentro do elemento ul

    ul.innerHTML = ul.innerHTML + "<li>Ano: 2023</li>";      // concatenado o li com 'Ano: 2023'

    const alterando = document.querySelector('#profissional');
    const h1 = alterando.querySelector('h1');
    if (h1) {       // verifica se h1 foi corretamente definido antes de acessar sua propriedade innerHTML
        h1.innerHTML = "Luis Henrique S. F.";
    } else {
        console.error("Elemento <h1> não encontrado dentro do elemento com ID 'profissional'");
    }

}