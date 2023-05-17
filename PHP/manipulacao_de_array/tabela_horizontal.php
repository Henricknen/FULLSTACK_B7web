<?php
$array = [
    'nome' => 'Luis Henrique S. F',
    'idade' => 31,
    'graduação' => 'Análise e desenvolvimento de sistemas',
    'tecnico' => 'Tecnico em informatica para internet',
    'tecnico ' => 'Tecnico em eletroeletronica',
    'curso ' => 'Programador Front-end',
    'curso' => 'Logica de programação',
    'profissao' => 'FullStack'
];

$chaves = array_keys($array);       // pegando as chaves do '$array' ultilizando função 'array_keys'
$valores = array_values($array);       // pegando os valores do '$array' ultilizando função 'array_values'

?>

<table border = "1">
    <tr>        <!-- 1º linha exibirá apenas as informações das '$chaves' -->
        <?php foreach($chaves as $chave): ?>
            <th><?php echo $chave; ?></th>      <!-- ultilizando 'tr' para imprimir as colunas que dependerá da quantidade do array '$chaves' -->
        <?php endforeach; ?>
    </tr>
    <tr>        <!-- 2º linha exibirá apenas as informações dos 'valores' -->
        <?php foreach($valores as $valor): ?>
            <td><?php echo $valor; ?></td>      <!-- imprimindo as colunas que dependerá da quantidade do array '$valores' -->
        <?php endforeach; ?>
    </tr>
</table>