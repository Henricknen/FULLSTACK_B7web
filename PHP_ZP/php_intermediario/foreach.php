<?php

$profissional = array(
    array("nome"=> "Luis Henrique S F", "idade"=> 32, "formacao"=> "Analise e Desenvolvimento de sistemas", "profissao"=> "Programador FullStack <br/>"),
    array("nome"=> "Luis Henrique S F", "idade"=> 32, "formacao"=> "Tecnico em Informatica para internet", "profissao"=> "Programador FullStack <br/>"),
    array("nome"=> "Luis Henrique S F", "idade"=> 32, "formacao"=> "Tecnico em Eletroeletronica", "profissao"=> "desenvolvedor de sistemas eletroeletronicos <br/>"),
    array("nome"=> "Luis Henrique S F", "idade"=> 32, "formacao"=> "Programador Front End", "profissao"=> "Programador Front End <br/>")
);

foreach($profissional as $eu) {
    echo "Meu nome é: ". $eu["nome"]. " /Idade: ". $eu['idade']. " /Minha formação: [". $eu['formacao']. "] /Profissao: ". $eu['profissao']. "<br/>";
}

$nome_completo = array(
    "Primeiro"=> "Luis",
    "Segundo"=> "Henrique",
    "Treçeiro"=> "Silva",
    "Quarto"=> "Ferreira"
);

foreach($nome_completo as $chave=> $dado) {     // pegando 'chave' e 'valor'
    echo $chave. " = ". $dado. "<br/>";
}

?>