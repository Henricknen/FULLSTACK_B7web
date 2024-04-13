function apertou() {
    console.log("Apertou");
}

function segurou() {
    console.log("segurou");
}

function soltou() {
    console.log("Soltou");
}

document.addEventListener('keydowm', apertou);        // 'document' aplica o evento quando o clique for em qualquer lugar da página
document.addEventListener('keypress', segurou);           // ultilizando eventos no javascript
document.addEventListener('keyup', soltou);                 // primeiro parâmetro é o nome do evento e o segundo o nome da função