<!DOCTYPE html>
<html lang = "pt-br">

  <head>

    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name = "description" content = "<? bloginfo('description'); ?>">       <!-- 'description' descrição do site -->
    <meta name = "author" content = "">
    
    <?php wp_head(); ?>     <!-- puchando os 'css' -->

  </head>

  <body>

<nav class = "navbar navbar-expand-lg navbar-light fixed-top" id = "mainNav">
      <div class = "container">

        <?php
        if(has_custom_logo()) {   // se houver logo sera apresentada na tela
            the_custom_logo();
        }
        ?>
        
        <!-- <a class = "navbar-brand" href = "index.html">Start Bootstrap</a> -->

        <button class = "navbar-toggler navbar-toggler-right" type = "button" data-toggle = "collapse" data-target = "#navbarResponsive" aria-controls = "navbarResponsive" aria-expanded = "false" aria-label = "Toggle navigation">
          Menu
          <i class = "fa fa-bars"></i>
        </button>

        <?php
        if(has_nav_menu('primary')) {       // se menu 'existir' sera mostrado
            wp_nav_menu(array(
                'theme_location'=> 'primary',
                'fallback_cb'=> false,
                'container_class'=> 'collapse navbar-collapse',
                'container_id'=> 'navbarResponsive',
                'menu_class'=> 'navbar-nav ml-auto'
            ));
        }
        ?>

      </div>
    </nav>