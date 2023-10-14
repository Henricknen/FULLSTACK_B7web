<?php

session_start();        // gerando uma sessão e o ideal é que isso seja a 1º linha do código

$_SESSION["profissional"] = "Luis Henrique Silva Ferreira";     // '$_SESSION' é ultilizado para guardar dados
$_SESSION["formacao"] = array(      // // '$_SESSION' com um array
    "Análise e desenvolvimento de sistemas",
    "Técnico em Informática para internet",
    "Técnico em eletroeletrônica",
    "Programador Front End",
    "Lógica de programação",
    "PHP",
    "Laravel",
);

echo "Sessão concluida com sucesso...<br/>";

echo "Me chamo: ". $_SESSION["profissional"]. "<br/>";        // buscando a informação da sessão que esta salva no servidor

echo "Minha formação: " . implode(", ", $_SESSION["formacao"]). "<br/>";
?>

<?php

setcookie("Programador", "FullStack", time() + 3600);        // gerando 'cookie' o 1º parâmetro é a chave(identificação) o 2º é o valor que será pego e o 3º é o tempo de duração do 'cookie'

echo "<br/>Cookie setado com sucesso...<br/>";

echo "O Cookie é: ". $_COOKIE["Programador"]       // acessando o 'cookie' se ultiliza a variável global '$_COOKIE' com a 'chave' como parâmetro

?>