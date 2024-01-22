<?php       // arquivo de configutação

require_once get_template_directory() . '/include/setup.php';


add_action("wp_enqueue_scripts", "lm_theme_styles"); // Hook para carregar estilos

add_action("after_setup_theme", "lm_after_setup"); // Hook após a configuração do tema

add_action("widgets_init", "lm_widgets"); // Hook para inicialização de widgets