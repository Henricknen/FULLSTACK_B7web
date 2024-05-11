document.body.addEventListener('keyup', (event)=> {     // 'document.body' representa o corpo do projeto,
    playSound(event.code.toLowerCase());
});

function playSound(sound) {
    let audioElement = document.querySelector(`#s_${sound}`);

    if(audioElement) {
        audioElement.play();
    }
}