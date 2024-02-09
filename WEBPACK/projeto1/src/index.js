import $ from 'jquery';      // importando o 'jquery'

$(function() {
    
    $('#botao'). on('click', function() {       // botão com uma 'ação de click' e executará uma função
        $('h1'). html('Programador FullStack');     // altera o 'h1'
    });
    
});     // 'rodando' o jquery