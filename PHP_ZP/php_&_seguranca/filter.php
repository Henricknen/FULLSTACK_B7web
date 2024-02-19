<?php

$email = 'l.henrick@live.com';
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {     // filtro 'FILTER_VALIDATE_EMAIL' verifica se a variável corresponde a um email
    echo "É um email<br/>";
} else {
    echo "Não é um email<br/>";
}

echo "-----------------------------------------------------------------<br/>";

$numero = 10;
if(filter_var($numero, FILTER_VALIDATE_INT)) {       // filtro 'FILTER_VALIDATE_INT' verifica de a variável é um inteiro 'int'
    echo "É um inteiro<br/>";
} else {
    echo "Não é um inteiro<br/>";
}

echo "--------------------------------------------------------------------------------------------------------------------------------<br/>";

$html = "Me chamo Luis Henrique S. F. sou programador Front End, Back End <strong><ul>Full Stack<ul/><strong/>";
$html = filter_var($html, FILTER_SANITIZE_SPECIAL_CHARS);       // filtro 'FILTER_SANITIZE_SPECIAL_CHARS' transforma o html em um texto legível
echo $html;

echo "<br/>----------------------------------------------------------------------------------------------------------------------------<br/>";

$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);       // filtro 'FILTER_VALIDATE_EMAIL' válida de o parâmetro passando como GET na barra de navegação por 'INPUT_GET' é um email
echo $email;

echo "<br>-----------------------------------------------------------------<br/>";

$prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_VALIDATE_INT, array(        // validando um 'selct'
    'options' => array(     // definir os valores mínimo e máximo permitidos, e o valor padrão em caso de falha na validação
        'min-range' => 1,
        'max-range' => 2,
        'default' => 1
    )
));
echo "PRIORIDADE: ". $prioridade;       // exibindo a prioridade

?>

<form method="POST">
    <select name = "prioridade">
        <option value = "1">Prioridade 1</option>
        <option value = "2">Prioridade 2</option>
        <option value = "3">Prioridade 3</option>
        <option value = "4">Prioridade 4</option>
    </select>

    <input type = "submit" value = "Enviar" />
</form>