<aside class = "sidebar">    
    <?php
    if (is_active_sidebar('lp_sidebar')) {       // verificando se existe 'sidebar' criado e se ele está ativo no tema
        dynamic_sidebar('lp_sidebar');
    }
    ?>
</aside>

