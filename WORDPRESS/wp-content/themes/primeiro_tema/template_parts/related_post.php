<div class = "post_related_item">
    <?php if(has_post_thumbnail()): ?>      <!-- foto se tiver -->
        <a href = "<?php the_permalink(); ?>" class = "post_thumbnail">
            <?php the_post_thumbnail('full', array('class'
                => 'post_miniatura')); ?>
        </a>
    <?php endif; ?>

    <h2><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>      <!-- titulo do post -->

    <p>
        <?php comments_number('0 comentários', 'um comentário', '% comentários'); ?> /      <!-- quantidade de comentarios -->
        <a href = "<?php the_permalink(); ?>">LEIA MAIS...</a>
    </p>


</div>