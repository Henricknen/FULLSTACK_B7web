<?php
// Include
require get_template_directory(). '/include/setup.php';     // puchando arquivo 'setup.php'

// Hooks
add_action("wp_enqueue_scripts", "ls_theme_styles");       // executa os 'estilos' e 'scripts'
add_action("after_setup_theme", "ls_after_setup");            // define 'propriedades especificas' de tema
?>