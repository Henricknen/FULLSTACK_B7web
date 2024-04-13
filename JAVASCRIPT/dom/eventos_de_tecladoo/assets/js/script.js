function soltou(e) {
    console.log('Tecla apertada', e.code);        // 'e.code' mostra qual tecla foi precionada
    console.log('Shift ?' + e.shiftKey);        // retorna 'true' ou 'false' se o shift estiver ou não estiver sido precionado
    console.log('Crtl ?' + e.ctrlKey);
    console.log('Alt ?' + e.altKey);

    console.log(e.key);             // 'e.key' mostra as teclas com mais detalhe
}

const input = document.querySelector('input');
input.addEventListener('keyup', soltou);        // inserindo evento no input