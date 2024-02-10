import $ from 'jquery';      // importando o 'jquery'
import './css/style.css';

$(function() {
    
    $('#botao'). on('click', function() {       // botão com uma 'ação de click' e executará uma função
        $('h1'). html('Programador [FullStack]');     // altera o 'h1'

        $(this). addClass('botao');
    });
    
});     // 'rodando' o jquery