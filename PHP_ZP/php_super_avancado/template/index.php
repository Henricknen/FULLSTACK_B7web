<?php       // parte lógica
require 'template.php';

$array = array(     // array com os dados
    "programando"=> "PHP",
    "nome"=> "Luis Henrique Silva Ferreira",       // array com "chaves" e "valores"
    "idade"=> 32
);

$tpl = new Template('template.phtml');       // definindo a classe
$tpl-> render($array);      // redenrizando como array de dados

?>