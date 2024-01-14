<?php get_header(); ?>      <!-- puchando conteúdo do arquivo 'header.php' -->

<section>

    <div class = "container">       <!-- conteúdo do site -->

        <h1>
            Voçe pesquisou por: <?php echo get_search_query(); ?>        <!-- função 'get_search_query' retorna o termo pesquisado -->
        </h1>

        <?php if(have_posts()): ?>      <!-- verificando se tem 'posts' -->
            <?php while(have_posts()): ?>
                <?php the_post(); ?>

                <?php get_template_part('template_parts/post'); ?>       <!-- puxando o 'template_part/post' -->

            <?php endwhile; ?>
        <?php endif; ?>

        <div class="paginacao">
            <div class="pagina_anterior"><?php previous_posts_link('Página Anterior'); ?></div>     <!-- função 'previous_posts_link' gera um link -->
            <div class="pagina_proxima"><?php next_posts_link('Próxima Página'); ?></div>
        </div>

    </div>

    <?php get_sidebar(); ?>     <!-- pucha o arquivo 'sidebar' -->

    <div style = "clear:both"></div>        <!-- está div limpa todos os 'float' e volta o site ao normal -->

</section>

<?php get_footer(); ?>