<?php get_header(); ?>
<?php if(have_posts()): ?>
    <?php while(have_posts()): ?>
        <?php the_post(); ?>

        <header class = "masthead" style = "background-image: url('<?php       // Header
           if(has_post_thumbnail()) {       // se existir a 'thumbnail'
                echo get_the_post_thumbnail_url($post-> ID, 'full');      // pega a 'url' da thumbnail
           } ?>
        ?>')">
      <div class = "overlay"></div>
      <div class = "container">
        <div class = "row">
          <div class = "col-lg-8 col-md-10 mx-auto">
            <div class = "post-heading">

              <h1><?php the_title(); ?></h1>

              <?php if(function_exists('the_subtitle')): ?>     <!-- só apareçeta o subtitulo se a função 'subtitle' existir -->
                <h2 class = "subheading"><?php the_subtitle(); ?></h2>
              <?php endif; ?>

              <span class = "meta">Postado por
                <a href = "<?php echo get_author_posts_url( get_the_author_meta("ID") ); ?>"><?php the_author(); ?></a>
                em <?php the_date(); ?></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <article>       <!-- Post -->
      <div class = "container">
        <div class = "row">
          <div class = "col-lg-8 col-md-10 mx-auto">
            <?php the_content(); ?>     <!-- deixando o conteúdo dinâmico -->
          </div>
        </div>
      </div>
    </article>

    <hr>
    <?php endwhile; ?>
<?php endif; ?>



    <?php get_footer(); ?>