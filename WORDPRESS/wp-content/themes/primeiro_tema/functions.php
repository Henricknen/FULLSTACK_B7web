<?php
// includes
require get_template_directory(). '/include/setup.php';

// hooks
add_action('wp_enqueue_scripts', 'lp_theme_styles');       // evento 'wp_enqueue_scripts' permite incluir 'css' e 'javascripts' no cabeçalho ou rodapé de uma página

add_action('after_setup_theme', 'lp_after_setup');       // este hook será carregado depois que o tema for 'completamente carregado'

add_action('widgets_init', 'lp_widgets');       // habilita o 'sidebar'