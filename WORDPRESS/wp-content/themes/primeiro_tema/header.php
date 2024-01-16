<html>     <!-- Estrutura inicial do tema -->
<head>
    <?php wp_head(); ?>     <!-- função 'wp_head' indica o momento de adiçionar os eventos de 'css' -->
</head <?php body_class(); ?>>      <!-- função 'body_class'cria algumas classes dinamicamente com base nas características da página -->
<body>
    <header>        <!-- tag 'header' define o cabeçalho do site -->

        <?php
        if(has_custom_logo()) {         // verificando se existe um 'logo'
            the_custom_logo();
        }
        ?>

        <h1><a href = "<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>        <!-- função 'bloginfo' permite inserir informações do blog -->

        <div style = "clear:both"></div>         <!-- desce o menu -->

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
    </header>