<?php
$ingredientes = [       // array '$ingredientes'
    'açucar',
    'farinha de trigo',
    'ovo',
    'leite',
    'fermento em pó'
];

echo '<h2>Ingredientes/ Valor</h2>';

foreach($ingredientes as $valor) {     // 'foreach' percorrerá o array '$ingredientes' e a cada rodada do loop, a variável '$valor' assumirá um valor do array '$ingredientes'
    echo "Item: ". $valor. "<br><br>";
}

echo '<h2>Ingredientes/ Chave e valor</h2>';

foreach($ingredientes as $chave => $valor) {     // ultilizando '$chave => $valor' para pegar a chave e o valor dos itens
    echo "Item: ". ( $chave + 1). ": ". $valor. "<br><br>";      // '$chave + 1' faz a impressão da '$chave' iniçiar em 1
}

echo '<h2>Ingredientes/ Lista</h2>';

echo '<ul>';        // ultilização de 'ul' para formar a lista
foreach($ingredientes as $valor) {     // pegando somente o 'valor'
    echo '<li>'. $valor. '</li>';
}
echo '</ul>';

echo '<h2>Ingedientes/ Chaves</h2>';

print_r($ingredientes);     // pegando a 'chave de identificação' do item