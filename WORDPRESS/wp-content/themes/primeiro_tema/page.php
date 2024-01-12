<?php get_header(); ?>      <!-- puchando conteúdo do arquivo 'header.php' -->

<section>

    <div class = "container">       <!-- conteúdo do site -->
        <?php while(have_posts()): ?>
            <?php the_post(); ?>

            <article>
                
                <h2><?php the_title(); ?></h2>      <!-- mostra o 'link' e o 'titulo' do post -->

                <p>
                    <?php the_content(); ?>     <!-- exibe o conteúdo inteiro 'do' post -->
                </p>

                <?php
                    if(comments_open()) {      // verificando se comentários estão abertos para posts
                        ?>
                    
                        <hr>

                        <p>
                            <?php comments_number('0 comentários', 'um comentário', '% comentários'); ?>      <!-- exibindo a quantidade de comentários -->
                        </p>

                        <?php
                        comments_template();        // chama arquivo 'comments.php'
                    }
                ?>

            </article>
        <?php endwhile; ?>

    </div>

    <?php get_sidebar(); ?>     <!-- pucha o arquivo 'sidebar' -->

    <div style = "clear:both"></div>        <!-- está div limpa todos os 'float' e volta o site ao normal -->

</section>

<?php get_footer(); ?>