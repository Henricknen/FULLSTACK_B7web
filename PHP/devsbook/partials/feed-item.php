<?php
require_once 'feed-item-script.php';        // puxando o arquivo 'feed-item-script.php'

$actionPhrase = '';
if (isset($item)) {
    switch ($item->type) {
        case 'text':
            $actionPhrase = 'fez um post';
            break;
        case 'photo':
            $actionPhrase = 'postou uma foto';
            break;
    }
}
?>

<div class="box feed-item" data-id="<?=$item->id; ?>">
    <div class="box-body">
        <div class="feed-item-head row mt-20 m-width-20">
            <div class="feed-item-head-photo">
                <?php if ($item !== null && $item->user !== null && $item->user->avatar !== null) : ?>
                    <a href="<?= $base; ?>/perfil.php?id=<?= $item->user->id; ?>"><img src="<?= $base; ?>/media/avatars/<?= $item->user->avatar; ?>" /></a>
                <?php else : ?>
                    <img src="/assets/images/user.png" />        <!-- Caso a variável $item, $item->user ou a propriedade avatar sejam nulas, insere uma imagem padrão -->
                <?php endif; ?>
            </div>

            <div class="feed-item-head-info">
                <a href="<?= $base; ?>/perfil.php?id=<?= isset($item->user->id) ? $item->user->id : ''; ?>">
                    <span class="fidi-name"><?= isset($item->user->name) ? $item->user->name : ''; ?></span>        <!-- mostra o nome do usuário logado -->
                </a>
                <span class="fidi-action"><?= $actionPhrase; ?></span>      <!-- mostra uma frase que depende do tipo do 'post' -->
                <br />
                <span class="fidi-date"><?= isset($item->created_at) ? date('d/m/Y', strtotime($item->created_at)) : ''; ?></span>      <!-- gerando a data -->
            </div>
            <div class="feed-item-head-btn">
                <img src="<?= isset($base) ? $base : ''; ?>/assets/images/more.png" />
            </div>
        </div>
        <div class="feed-item-body mt-10 m-width-20">
            <?php
            switch ($item->type) {
                case 'text':
                    echo nl2br($item-> body);
                break;
                case 'photo':
                    echo '<img src = "'. $base. '/media/ uploads/'. $item-> body.'"/>';
                break;
            }
            ?>
        </div>
        <div class="feed-item-buttons row mt-20 m-width-20">
            <div class="like-btn <?= isset($item->liked) && $item->liked ? 'on' : ''; ?>">
                <?= isset($item->likeCount) ? $item->likeCount : ''; ?>
            </div>
            <div class="msg-btn"><?= isset($item->comments) ? count($item->comments) : ''; ?></div>
        </div>
        <div class="feed-item-comments">
            <div class="feed-item-comments-area">
                <?php foreach ($item->comments as $comment) : ?>
                    <div class="fic-item row m-height-10 m-width-20">
                        <div class="fic-item-photo">
                            <a href="<?= $base; ?>/perfil.php?id=<?= $comment-> id_user; ?>"><img src="<?= $base; ?>/media/avatars/<?= $comment-> user-> avatar; ?>" /></a>
                        </div>
                        <div class="fic-item-info">
                            <a href="<?= $base; ?>/perfil.php?id=<?= $comment-> id_user; ?>"><?= $comment-> user-> name; ?></a>
                            <?= $comment-> body; ?>     <!-- comentário -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="fic-answer row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href="<?= $base; ?>/perfil.php">
                        <img src="<?= $base; ?>/media/avatars/<?= isset($userInfo->avatar) ? $userInfo->avatar : ''; ?>" />
                    </a>
                </div>
                <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
            </div>
        </div>
    </div>
</div>
