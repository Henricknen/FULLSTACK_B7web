<?php
$firstName = current(explode(' ', $userInfo->name));       // sepando o nome, 'current' pega o primeiro nome
?>
<div class="box feed-new">
    <div class="box-body">
        <div class="feed-new-editor m-10 row">
            <div class="feed-new-avatar">
                <img src="<?= $base; ?>/media/avatars/<?= $userInfo->avatar; ?>" />
            </div>
            <div class="feed-new-input-placeholder">O que você está pensando, <?= $firstName; ?>?</div>
            <div class="feed-new-input" contenteditable="true"></div>
            <div class="feed-new-send">
                <img src="<?= $base; ?>/assets/images/send.png" />
            </div>
            <form class= "feed-new-form " action="<?= $base; ?>/feed_editor_action.php" method="POST">      <!-- formulário -->
                <input type="hidden" name="body">       <!-- 'hidden' não deixar o input aparecer na tela -->
            </form>
        </div>
    </div>
</div>
<script>
    let feedInput = document.querySelector('.feed-new-input');      // seleção ultilizando 'querySelector'
    let feedSubmit = document.querySelector('.feed-new-send');
    let feedForm = document.querySelector('.feed-new-form');

    feedSubmit.addEventListener('click', function() {       // cliando ação de 'click'
        let value = feedInput.innerText.trim();     // pegando o texto que o usuário digitar, 'trim' tira os espaços do começo e do fim

        feedForm.querySelector('input[name = body]'). value = value;        // pegando o que foi digitado e inserindo no formulário
        feedForm.submit();      // enviando o formulário
    });
</script>