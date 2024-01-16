<?php
function lp_theme_styles() {
    wp_enqueue_style('theme_css', get_template_directory_uri(). '/assets/css/theme.css');       // função que adiçiona 'css'

    // wp_enqueue_script('theme_js', get_template_directory_uri(). '/assets/js/script.js', array('jquery'), '', true);        // função carrega os 'javascripts' parâmetro 'true' adiçiona a função no final do código
}

function lp_after_setup() {
    // add_theme_support('menus');     // adiçiona o suporte a 'menus' no tema

    add_theme_support('post-thumbnails');        // permite o tema suporta 'minhaturas' do posts
    
    add_theme_support('title-tag');
    
    add_theme_support('custom-logo');

    register_nav_menu('primary', __('Primary Menu', 'primeiro_tema'));      // registro da localização do menu de navegação
}

function lp_widgets() {
    register_sidebar(array(     // registrando o 'sidebar'
        'name'=> __('Primeiro_Sidebar', 'primeiro_tema'),       // propriedades
        'id'=> 'lp_sidebar',
        'description'=> __('Sidebar_para_o_tema', 'primeiro_tema'),

        // opções adiçionais
        'before_title'=> '<h4 class = "wp-block-latest-posts__post-title">',        // tag que ficará antes do título do width
        'after_title'=> '</h4>',

        'before_widget'=> '<div id = "%1$s" class = "widget %2$s">',
        'after_widget'=> '</div>'
    ));
}