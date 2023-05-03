<?php           // variveis´'$nome', '$profissao' e '$idade'
$nome = 'Luis Henrique Silva Ferreira';
$profissao = ': Programador FullStack';
$idade = 30;

$nomeProfissao = $nome . '' . $profissao;   // o '.' contatena variável '$nome' com espaço '' e com a variável '$profissao'
echo  $nomeProfissao ;

$perfil = " <br> $nome é um $profissao e tem $idade anos <br>";        // variável '$perfil' tem tipo de valor diferente
echo  $perfil ;

$perfilCompleto = $nome;
$perfilCompleto .= $profissao;      // o '.=' pega o que já tinha na variável '$perfilCompleto' e adiçiona o que tem na variável '$profissao'
echo  $perfilCompleto;