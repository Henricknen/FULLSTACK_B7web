<?php
// if(!empty($_FILES['foto']['tmp_name'])) {       // verifica se houve o envio de alguma foto

//     if($_FILES['foto']['type'] == 'image/png') {        // 'type' verifica se a imagem é do tipo 'png'
        
//         $nome = md5(rand(0, 9999). time()). '.png';      // gerando nome aleátorio para o arquivo reçebido ultilizando 'hash md5' e inserindo inserindo manualmente '.png' no arquivo
    
//         move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'. $nome);       // salva o arquivo na pasta 'fotos'
    
//         echo "Foto carregada com sucesso...";       // menssagem de conclusão

//     }

// }

if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {      // verifica se o arquivo foi enviado sem erros

    $file_tmp_name = $_FILES['foto']['tmp_name'];
    $file_type = $_FILES['foto']['type'];
    $file_extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    if($file_type === 'image/png' && $file_extension === 'png') {           // verifica se o arquivo é do tipo 'png'
        
        $nome = md5(uniqid('', true)) . '.png';             // gera um nome único para o arquivo usando 'md5'

        if(move_uploaded_file($file_tmp_name, 'fotos/' . $nome)) {        // move o arquivo para o diretório 'fotos'
            echo "Foto carregada com sucesso.";
        } else {
            echo "Erro ao carregar a foto.";
        }
    } else {
        echo "O arquivo deve ser uma imagem PNG.";
    }
} else {
    echo "Erro no envio do arquivo.";
}

