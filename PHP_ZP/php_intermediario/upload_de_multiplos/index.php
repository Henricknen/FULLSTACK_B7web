<pre>       <!-- 'pre' faz com que o texto seja 'literal' -->
<?php
if(isset($_FILES['arquivo'])) {
    for($q = 0; $q < count($_FILES['arquivo']['tmp_name']); $q++) {
        if($_FILES['arquivo']['error'][$q] === 0) {
            $nomedoarquivo = md5($_FILES['arquivo']['name'][$q] . time() . rand(0, 99)) . '.jpg';

            if(move_uploaded_file($_FILES['arquivo']['tmp_name'][$q], 'arquivos/' . $nomedoarquivo)) {
                echo 'Arquivo ' . $nomedoarquivo . ' enviado com sucesso.<br>';
            } else {
                echo 'Falha ao mover o arquivo ' . $nomedoarquivo . '<br>';
            }
        } else {
            echo 'Erro no envio do arquivo ' . $_FILES['arquivo']['name'][$q] . ': ' . $_FILES['arquivo']['error'][$q] . '<br>';
        }
    }
}
?>

</pre>

<form method = "POST" enctype = "multipart/form-data">

    Arquivo:<br/>
    <input type="file" name="arquivo[]" multiple /><br/><br/>     <!-- propriedade 'multiple' da possibilidade de seleçionar vários arquivos e '[]' transforma arquivo em um array -->

    <input type="submit" value="Enviar arquivos" />

</form>