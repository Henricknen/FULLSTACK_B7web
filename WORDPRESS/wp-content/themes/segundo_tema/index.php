<?php get_header(); ?>

    <header class = "masthead" style = "background-image: url('<?php echo get_template_directory_uri().'/img/home-bg.jpg' ?>')">      <!-- inserindo imagem na página iniçial -->
      <div class = "overlay"></div>
      <div class = "container">
        <div class = "row">
          <div class = "col-lg-8 col-md-10 mx-auto">
            <div class = "site-heading">
              <h1><?php bloginfo('name'); ?></h1>     <!-- 'bloginfo('name');' título da página -->
              <span class = "subheading"><?php bloginfo('description'); ?></span>     <!-- 'bloginfo('description');' descrição da página -->
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class = "container">         <!-- Main Content -->
      <div class = "row">
        <div class = "col-lg-8 col-md-10 mx-auto">
          <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
              <?php the_post(); ?>
              <?php get_template_part('template_parts/post'); ?>    <!-- puchando arquivo 'post' da pasta 'template_parts' -->
            <?php endwhile; ?>
          <?php endif; ?>

          <div class = "clearfix btn btn-primary float-right">          <!-- Pager -->
            <?php previous_posts_link('Página anterior'); ?>    <!-- link de páginação -->
          
            <?php next_posts_link('Próxima página'); ?>
          </div>
        </div>
      </div>
    </div>

    <hr>

<?php get_footer(); ?>