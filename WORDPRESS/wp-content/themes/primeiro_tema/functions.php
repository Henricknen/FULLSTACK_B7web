<?php
function lp_theme_styles() {
    wp_enqueue_style('theme_css', get_template_directory_uri(). '/assets/css/theme.css');       // função que adiçiona 'css'

    wp_enqueue_script('theme_js', get_template_directory_uri(). '/assets/js/script.js', array('jquery'), '', true);        // função carrega os 'javascripts' parâmetro 'true' adiçiona a função no final do código
}

// hook
add_action('wp_enqueue_scripts', 'lp_theme_styles');       // evento 'wp_enqueue_scripts' permite incluir 'css' e 'javascripts' no cabeçalho ou rodapé de uma página