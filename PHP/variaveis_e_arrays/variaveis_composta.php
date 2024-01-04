<?php
echo "Perfil profissional";
$profissional = array(      // criando um 'array' dentro da variável 'profissional'
    "nome" => "Luis Henrique Silva Ferreira<br>",       // "chave" => "valor"
    "Graduação" => "Análise e desenvolvimento de sistema<br>",      // '<br>' pula linha
    "Técnico" => "Eletroeletrônica<br>",
    "Técnico" => "Informática para internet<br>",
    "Espeçializaçâo" => "Lógica de programação<br>",
    "Espeçializaçâo" => "Front End<br>",
    "Pós Graduação<br>",        // se não colocar valor na chave o valor padrão séra '0'
    "Graduação<br>",        // e aumentará sucessivamante
    "Técnicos<br>",
    "Idade" => 31             // na úlima chave não é nessesario colocar vírgula ','
);

$profissional["Idade"] = 32;     // 'alterando' o valor da 'chave' idade 

echo "<pre>"; // Usando <pre> preserva a formatação do jeito que está
print_r($profissional);     // 'print_r' mostra todo o array da variável na tela
echo "</pre>";

echo "Especializações <br>";
$especializacao = array("Lógica de programação", "Tecnologia da informação e comunicação");

$especializacao[1] = "Front End";       // alterando o valor da posição '1'

echo "<pre>";
print_r($especializacao);
echo "</pre>";