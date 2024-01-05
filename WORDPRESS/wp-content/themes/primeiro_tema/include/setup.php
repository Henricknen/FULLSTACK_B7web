<?php
function lp_theme_styles() {
    wp_enqueue_style('theme_css', get_template_directory_uri(). '/assets/css/theme.css');       // função que adiçiona 'css'

    // wp_enqueue_script('theme_js', get_template_directory_uri(). '/assets/js/script.js', array('jquery'), '', true);        // função carrega os 'javascripts' parâmetro 'true' adiçiona a função no final do código
}

function lp_after_setup() {
    add_theme_support('menus');     // adiçiona o suporte a 'menus' no tema

    register_nav_menu('primary', __('Primary Menu', 'primeiro_tema'));      // registro da localização do menu de navegação
}
