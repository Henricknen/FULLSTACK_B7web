<?php
if(post_password_required()) {      // verificando se post precisa de senha
    return;
}

if(have_comments()) {       // verificando se existe comentários
    foreach($comments as $comment) {
        ?>

        <div class = "comentario">        <!-- exibindo os comentários -->
            <div class = "comentario_foto">
                <?php echo get_avatar($comment, 60); ?>
            </div>
            <div class=  "comentario_area">
                <strong><?php comment_author(); ?></strong> - <?php comment_date(); ?><br>      <!-- nome do autor e data do comentario -->
                <?php comment_text(); ?>        <!-- exibe o comentario do autor -->
            </div>
        </div>

        <?php
    }

    the_comments_pagination();      // páginação[1, 2, 3, 4, ....]
}

comment_form(array(     // função cria um formulário
    'comment_field'=> 'Comentario:<br/><textarea name = "comment"></textarea><br/>',       // inserindo um textarea
    'filds'=> array(        // 'filds' outros campos
        'author'=> 'Nome: <input type = "text" name = "author" placeholder = "Digite seu nume" /><br/>',
        'email'=> 'Email: <input type = "email" name = "email" placeholder = "Digite seu Email" /><br/>',
        'url'=> 'Url: <input type = "url" name = "url" placeholder = "Digite seu  Site" /><br/>'
    ),
    'class_submit'=> 'botao',     // classe do botão de submit
    'label_submit'=> 'Envie seu comentário',        // alterando o texto do botão
    'title_reply'=> 'Deixe um comentário'
)); 