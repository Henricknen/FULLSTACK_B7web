<?php
$numeros = [10, 20, 26, 88, 101, 74];

print_r("Função 'pop'<br>");
array_pop($numeros);        // função 'pop' remove o último item do array
print_r($numeros);
echo "<hr>";

print_r("Função 'shift'<br>");
array_shift($numeros);        // função 'shift'remove o primeiro item do array
print_r($numeros);
echo "<hr>";

print_r("Função 'in_array'<br>");
if(in_array(90, $numeros)) {     // função 'in_array' faz a verificação se existe determinado valor dentro do array
    echo "[Exite]";
} else {
    echo "[Não Existe]";
}
echo "<hr>";

print_r("Função 'array_search'<br>");
$pos = array_search(101, $numeros);      // função 'array_search' faz uma busca dentro do array se encontrar retorna a posição do item
echo "O número procurado está na posição: ". $pos. "<hr>";

print_r("Função 'sort'<br>");
sort($numeros);     // função 'sort' ordena o array em ordem 'crescente'
print_r($numeros);
echo "<hr>";

print_r("Função 'rsort'<br>");
rsort($numeros);     // função 'rsort' ordena o array em ordem 'decrescente'
print_r($numeros);
echo "<hr>";

print_r("Função 'asort'<br>");
asort($numeros);     // função 'asort' faz a ordenação e mantém as chaves em seus devidos valores
print_r($numeros);
echo "<hr>";

print_r("Função 'arsort'<br>");
arsort($numeros);     // função 'arsort' faz o reverso mantendo a chave de cada um
print_r($numeros);
echo "<hr>";

print_r("Função 'implode'<br>");
$nomes = ['Luis', ' Henrique', ' Silva', ' Ferreira'];
$nome = implode('', $nomes);        // função 'implode' transforma um 'array' em uma 'string' juntando todos elementos do array
echo $nome;