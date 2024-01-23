<html>
    <head>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>

            <div class="top_header">
                <nav class = "navbar navbar-default">
                    <div class = "container-fluid">       <!-- classe deixa o conteúdo fluído ficar responsivo -->
                        <div class = "collapse navbar-collapse">
                            <?php
                                if (has_nav_menu('top')) {        // se existir menu top
                                    wp_nav_menu(array(
                                        'theme_location' => 'top',
                                        'container'=> false,
                                        'fallback_cb'=> false 
                                    ));
                                }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
            
        </header>
</html>