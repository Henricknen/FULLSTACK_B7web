<?php

$nome = "Luis Henrique Silva Ferreira";
$nome2 = md5($nome); // 'md5' irreverssivel calcula o hash  do valor na variável $nome e armazena o resultado em $nome2
$nome3 = base64_encode($nome);      // criptografando ultilizando 'base64_encode' que é reversivel


echo "Nome original: ". $nome. "<br/>";
echo "Nome Cripto.(md5): ". $nome2. "<br>";
echo "Nome Cripto.(base64_encode): ". $nome3. "<br/>";
echo "Ultilizando decode pra descriptogravar [$nome3] que é igual a: ". base64_decode($nome3);

?>