function clicou() {
    console.log("O botão foi clicado...");
}

let botao = document.querySelector('.botao');       // seleçionando o elemento de class 'botao' e adiçionando o evento de click
botao.addEventListener("click", ()=> {      // função 'addEventListener' ultiliza dois parâmetros o primeiro é o tipo de eveto e o segundo a função que será executada
    clicou();
});