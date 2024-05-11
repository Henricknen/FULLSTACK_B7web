document.body.addEventListener('keyup', (event)=> {     // 'document.body' representa o corpo do projeto,
    playSound(event.code.toLowerCase());
});

document.querySelector('.composer button').addEventListener('click', ()=> {
    let song = document.querySelector('#input').value;

    console.log("Musica", song);
});

function playSound(sound) {
    let audioElement = document.querySelector(`#s_${sound}`);
    let keyElement = document.querySelector(`div[data-key="${sound}"]`);

    if(audioElement) {
        audioElement.currentTime = 0;
        audioElement.play();
    }

    if(keyElement) {
        keyElement.classList.add('active');

        setTimeout(()=> {
            keyElement.classList.remove('active');
        }, 300);
    }
}