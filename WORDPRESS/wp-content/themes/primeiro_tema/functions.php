<?php
// include
require get_template_directory(). '/include/lp_footer_functions.php';       // função pega a pasta do tema, 'include' com o seu arquivo

// hooks
add_action('shutdown', 'lp_fim');       // função do wordpress evento 'shutdown' é executado por último por sua vez executara a função 'lp_fim'