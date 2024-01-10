<?php
if(post_password_required()) {      // verificando se post precisa de senha
    return;
}

if(have_comments()) {       // verificando se existe comentários
    foreach($comments as $comment) {
        ?>

        <div class="comentario">        <!-- exibindo os comentários -->
            <div class="comentario_foto">
                <?php echo get_avatar($comment, 60); ?>
            </div>
            <div class="comentario_area">
                <strong><?php comment_author(); ?></strong> - <?php comment_date(); ?><br><br>
                <?php comment_text(); ?>        <!-- exibe o comentario do autor -->
            </div>
        </div>

        <?php
    }
}
?>