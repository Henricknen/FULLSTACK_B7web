async function enviar() {
    let arquivo = document.getElementById('arquivo'). files[0];     // pegando o arquivo '0' que foi seleçionado

    let body = new FormData();      // classe 'FormData' permite fazer o envio de arquivos
    body.append('title', 'afdkljfkçajfk');
    body.append('arquivo', arquivo);

    let req = await fetch('https://www.url_inesistente.com.br/upload', {        // url para onde será enviado o arquivo
        method: 'POST',     // propriedades da requisição
        body: body,
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    });
}