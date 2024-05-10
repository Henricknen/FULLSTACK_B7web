function mostrar() {
    let imagem = document.getElementById("imagem"). files[0];       // pegando o arquivo

    let img = document.createElement('img');        // criando a imagem
    img.src = URL.createObjectURL(imagem);      // local da imagem
    img.width = 200; 

    document.getElementById("area"). appendChild(img);      // mostrando a imagem
}