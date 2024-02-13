import $ from 'jquery';      // importando o 'jquery'
import './css/style.css';       // importando o 'css' que está dentro da pasta css
import Botao from './components/botao/index.js';

$(function() {
    
    let botao = new Botao();        // usando a 'classe Botao'
    botao.setTitle('Testador');     // 'titulo' do botao
    botao.setClick(function() {
        alert("Clicou...");
    });

    $('.area').html(botao.render());        // inserindo botão dentro da div class 'area' deo html
});