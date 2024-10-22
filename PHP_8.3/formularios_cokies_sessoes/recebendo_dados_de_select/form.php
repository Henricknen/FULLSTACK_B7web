<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JAVASCRIPT', 'SQL'];

$opcoes_validas = ['PHP', 'JAVASCRIPT', 'SQL'];

$erro = null;
$sucesso = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
    if (isset($_POST['opcoes']) && is_array($_POST['opcoes'])) {        // verifica se a chave 'opcoes' está definida e se é um array
        $opcoes = $_POST['opcoes'];        
        
        if (count($opcoes) != 2) {      // verifica se o número de opções selecionadas é igual a 2
            $erro = "Selecione duas tecnologias. Exatamente!";
        } else {            
            $sucesso = "Tecnologias selecionadas com sucesso!";     // aqui processar as opções com sucesso
        }
    } else {
        $erro = "Nenhuma tecnologia selecionada!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1>Formulário</h1>
    <form method="POST">
        <?php if (exibirErro($erro)) : ?>
            <p style="color:red"><?= $erro; ?></p>
        <?php endif; ?>

        <?php if (exibirErro($sucesso)) : ?>
            <p style="color:green"><?= $sucesso; ?></p>
        <?php endif; ?>

        <select name="opcoes[]" multiple>     <!-- '[]' em opcoes permite enviar multiplas informações, 'multiple' define o select como multiplo -->
            <?php foreach ($tecnologias as $tec) : ?>
                <option value = "<?= $tec; ?>"><?= $tec; ?></option>
            
            <?php endforeach;?>

            
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
