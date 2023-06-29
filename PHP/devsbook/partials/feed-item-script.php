f<script>
window.onload = function() {

    function closeFeedWindow() {        // função feçha todas as janelas
        document.querySelectorAll('.feed-item-more-window').forEach(item=>{
            item.style.display = 'none';
        });
        
        document.removeEventListener('click', closeFeedWindow);     // remove a função da tela toda
    }

    document.querySelectorAll('.feed-item-head-btn').forEach(item=>{        // seleção de todos os botões 'feed-item-head-btn' e vai adiçionar um 'click'
        item.addEventListener('click', ()=>{
            closeFeedWindow();

            item.querySelector('.feed-item-more-window').style.display = 'block';
            setTimeout(()=>{
                document.addEventListener('click', closeFeedWindow);
            }, 500);
        });
    });

    document.querySelectorAll('.like-btn').forEach(item=>{      // monitorando todos botões 'like'
        item.addEventListener('click', ()=>{        // evento de click
            let id = item.closest('.feed-item').getAttribute('data-id');
            let count = parseInt(item.innerText);
            if(item.classList.contains('on') === false) {
                item.classList.add('on');
                item.innerText = ++count;
            } else {
                item.classList.remove('on');
                item.innerText = --count;
            }

            fetch('ajax_like.php?id='+id);
        });
    });

    document.querySelectorAll('.fic-item-field').forEach(item=>{        // codigo responsavel pelos comentarios
        item.addEventListener('keyup', async (e)=>{
            if(e.keyCode == 13) {
                let id = item.closest('.feed-item').getAttribute('data-id');
                let txt = item.value;
                item.value = '';

                let data = new FormData();
                data.append('id', id);
                data.append('txt', txt);

                let req = await fetch('ajax_comment.php', {
                    method: 'POST',
                    body: data
                });
                let json = await req.json();        // transforma o resultado em 'json'

                if(json.error == '') {
                    let html = '<div class="fic-item row m-height-10 m-width-20">';
                    html += '<div class="fic-item-photo">';
                    html += '<a href="'+json.link+'"><img src="'+json.avatar+'" /></a>';
                    html += '</div>';
                    html += '<div class="fic-item-info">';
                    html += '<a href="'+json.link+'">'+json.name+'</a>';
                    html += json.body;
                    html += '</div>';
                    html += '</div>';

                    item.closest('.feed-item')
                        .querySelector('.feed-item-comments-area')
                        .innerHTML += html;
                }

            }
        });
    });
};
</script>