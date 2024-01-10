<?php get_header(); ?>      <!-- puchando conteúdo do arquivo 'header.php' -->

<section>

    <div class = "container">       <!-- conteúdo do site -->
        <?php if(have_posts()): ?>      <!-- verificando se tem 'posts' -->
            <?php while(have_posts()): ?>
                <?php the_post(); ?>

                <article>
                    
                    <h2><?php the_title(); ?></h2>      <!-- mostra o 'link' e o 'titulo' do post -->

                    <?php if(has_post_thumbnail()): ?>      <!-- verificando se existe minhatura do post -->
                            <?php the_post_thumbnail('full'); ?>        <!-- 'imprime' a foto do post em tamanho original 'full' -->
                    <?php endif; ?>


                    <p>
                        <?php echo get_the_date(); ?> /       <!-- exibindo a 'data' -->
                        
                        <a href="<?php echo get_author_posts_url(       // exibindo o 'nome do autor'
                            get_the_author_meta('ID')) ?>"><?php
                            the_author(); ?></a> /

                        <?php the_category(', '); ?>        <!-- exibindo as 'categorias' -->
                    </p>

                    <p>
                        <?php the_content(); ?>     <!-- exibe o conteúdo inteiro 'do' post -->
                    </p>

                    <p>
                        <?php comments_number('0 comentários', 'um comentário', '% comentários'); ?> /     <!-- exibindo a quantidade de comentários -->
                    </p>

                    <hr>

                    <?php
                        if(comments_open()) {      // verificando se comentários estão abertos para posts
                            comments_template();        // chama arquivo 'comments.php'
                        }
                    ?>

                </article>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="paginacao">
            <div class="pagina_anterior"><?php previous_post_link(); ?></div>
            <div class="pagina_proxima"><?php next_post_link(); ?></div>
        </div>

    </div>

    <?php get_sidebar(); ?>     <!-- pucha o arquivo 'sidebar' -->

    <div style = "clear:both"></div>        <!-- está div limpa todos os 'float' e volta o site ao normal -->

</section>

<?php get_footer(); ?>