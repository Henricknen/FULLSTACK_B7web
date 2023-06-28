<?php
$firstName = current(explode(' ', $userInfo->name)); // Separando o nome, 'current' pega o primeiro nome
?>

<div class="box feed-new">
    <div class="box-body">
        <div class="feed-new-editor m-10 row">
            <div class="feed-new-avatar">
                <img src="<?= $base; ?>/media/avatars/<?= $userInfo->avatar; ?>" />
            </div>
            <div class="feed-new-input-placeholder">
                O que você está pensando, <?= $firstName; ?>?
            </div>
            <div class="feed-new-input" contenteditable="true"></div>
            <div class="feed-new-photo">
                <img src="<?= $base; ?>/assets/images/photo.png" />
                <input type="file" name="photo" class="feed-new-file" accept="image/png, image/jpeg, image/jpg" />
            </div>
            <div class="feed-new-send">
                <img src="<?= $base; ?>/assets/images/send.png" />
            </div>
            <form class="feed-new-form" action="<?= $base; ?>/feed_editor_action.php" method="POST">
                <input type="hidden" name="body">
            </form>
        </div>
    </div>
</div>
<script>
    // Selecionando elementos do DOM
    let feedInput = document.querySelector('.feed-new-input');
    let feedSubmit = document.querySelector('.feed-new-send');
    let feedForm = document.querySelector('.feed-new-form');
    let feedPhoto = document.querySelector('.feed-new-photo');
    let feedFile = document.querySelector('.feed-new-file');

    // Evento de clique na foto
    feedPhoto.addEventListener('click', function() {
        feedFile.click();
    });

    // Evento de mudança no arquivo selecionado
    
    feedFile.addEventListener('change', async function(){       // quando hover uma mudança 'change'
        let photo = feedFile.files[0];
        let formData = new FormData();

        formData.append('photo', photo);
        let req = await fetch('ajax_upload.php', {      // faz 'requisição' ajax
            method: 'POST',
            body: formData
        });
        let json = await req.json();

        if(json.error != '') {
            alert(json.error);
        }

        window.location.href = window.location.href;        // independente de dar erro ou não a tela será atualizada
    });

    // Evento de clique no botão de envio
    feedSubmit.addEventListener('click', function() {
        let value = feedInput.innerText.trim();

        feedForm.querySelector('input[name=body]').value = value;
        feedForm.submit();
    });
</script>
