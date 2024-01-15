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
                        <?php comments_number('0 comentários', 'um comentário', '% comentários'); ?>     <!-- exibindo a quantidade de comentários -->
                    </p>

                    <hr>

                        <h3>Posts relaçionados</h3>

                        <?php
                        $categories = get_the_category();

                        $bp_query = new WP_Query(array(     // classe 'WP_Query' faz uma busca interna no wordpress
                            'posts_per_page'=> 3,       // propriedade de quantos posts serão pegos
                            'posts__not_in'=> array( $post-> ID ),       // 'posts__not_in' exclui posts determinados nas chaves '()' e '$post-> ID' pega o id da página atual
                            'cat'=> $categories[0]-> term_id
                        ));

                        if($bp_query-> have_posts()) {
                            while($bp_query-> have_posts()) {
                                $bp_query-> the_post();

                                get_template_part('template_parts/related_post');
                            }

                            wp_reset_postdata();        // resta a requisição 'feita' e volta para requisição 'principal'
                        }

                        ?>

                        <div style = "clear:both"></div>

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