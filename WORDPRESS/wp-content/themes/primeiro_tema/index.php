<html>     <!-- Estrutura inicial do tema -->
<head>
    <?php wp_head(); ?>     <!-- função 'wp_head' indica o momento de adiçionar os eventos de 'css' -->
</head>
<body>
    <h1>Meu Primeiro Tema</h1>

    <?php
    if(has_nav_menu('primary')) {        // verificando se 'existe' menu criado
        wp_nav_menu(array(      // mostrando o menu criado
            'theme_location'=> 'primary',        // localização
            'container'=> 'nav',
            'container_class'=> 'main_menu',
            'fallback_cb'=> false,      // se não estiver adiçionado nenhum item ao menu e estiver 'true' gerará um menu padrão

        ));

    }
    ?>
    
    <?php wp_footer(); ?>       <!-- indicando o momento de inserir os itens de roda pé -->
</body>
</html>
