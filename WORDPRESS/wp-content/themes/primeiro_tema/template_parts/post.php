<article>
    <?php if(has_post_thumbnail()): ?>      <!-- verificando se existe minhatura do post -->
        <a href = "<?php the_permalink(); ?>" class = "post_thumbnail">
            <?php the_post_thumbnail('full', array('class'
                => 'post_miniatura')); ?>        <!-- 'imprime' a foto do post em tamanho original 'full' -->
        </a>
    <?php endif; ?>

    <h2><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>      <!-- mostra o 'link' e o 'titulo' do post -->

    <p>
        <?php echo get_the_date(); ?> /       <!-- exibindo a 'data' -->
        
        <a href = "<?php echo get_author_posts_url(       // exibindo o 'nome do autor'
            get_the_author_meta('ID')) ?>"><?php
            the_author(); ?></a> /

        <?php the_category(', '); ?>        <!-- exibindo as 'categorias' -->
    </p>

    <p>
        <?php the_excerpt(); ?>     <!-- exibe o conteúdo 'do' post -->
    </p>

    <p>
        <?php comments_number('0 comentários', 'um comentário', '% comentários'); ?> /     <!-- exibindo a quantidade de comentários -->
        <a href = "<?php the_permalink(); ?>">LEIA MAIS...</a>
    </p>


</article>