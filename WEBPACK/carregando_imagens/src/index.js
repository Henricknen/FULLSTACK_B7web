import $ from 'jquery';      // importando o 'jquery'
import './css/style.css';
import Imagem from './images/php.jpg';       // importando imagem

$(function() {
    
    $('#botao'). on('click', function() {       // botão com uma 'ação de click' e executará uma função
        $('h1'). html('Programador [FullStack]');     // altera o 'h1'
        $(this). addClass('botao');

        $('#imagem'). atrr('src', Imagem);      // usando imagem
    });
    
});