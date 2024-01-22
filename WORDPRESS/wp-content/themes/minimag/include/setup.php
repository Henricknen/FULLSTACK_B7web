<?php
function lm_theme_styles() {        // função de estilos do tema
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');      // puchando os 'css'
    wp_enqueue_style('template_css', get_template_directory_uri() . '/assets/css/template.css');
    
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.min.js');        // puchando os 'js'
    wp_enqueue_script('script_js', get_template_directory_uri() . '/assets/js/script.js');
}
function lm_after_setup() {         // função após a configuração do tema
    add_theme_support("post-thumbnails");       // habilitando os thumbnails para apareçer as 'imagens' dos posts
    add_theme_support("title-tag");         // habilitando a tag de 'título'
    add_theme_support("custom-logo");   // habilitando a 'logo' customizada
    
    register_nav_menu("primary", "Menu Primario");      // registrando os menus
    register_nav_menu("top", "Menu Superior");
}
function lm_widgets() {         // função para inicialização de widgets
    
}