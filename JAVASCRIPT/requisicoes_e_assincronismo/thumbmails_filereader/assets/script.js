function mostrar() {
    let reader = new FileReader();      // 'FileReader' é um leitor de arquivo
    let imagem = document.getElementById('imagem'). files[0];        // pegando a imagem seleçionada

    reader.onloadend = function() {     // ultiliizando 'callback' quando o carregamenta da imagem finalizar será executado a função
        let img = document.createElement('img');
        img.src = reader.result;        // 'url' resultado da imagem
        img.width = 200;

        document.getElementById('area').appendChild(img);
    }

    reader.readAsDataURL(imagem);
}