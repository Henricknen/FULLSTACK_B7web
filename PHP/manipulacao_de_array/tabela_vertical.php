<?php
$array = [
    'nome' => 'Luis Henrique S. F',     // estás informações do '$array' serão linhas da tabela
    'idade' => 31,
    'graduação' => 'Análise e desenvolvimento de sistemas',
    'tecnico' => 'Tecnico em informatica para internet',
    'tecnico ' => 'Tecnico em eletroeletronica',
    'curso ' => 'Programador Front-end',
    'curso' => 'Logica de programação',
    'profissao' => 'Developer FullStack'
];
?>

<table border = "1">
    <?php foreach($array as $chave => $valor): ?>       <!-- ultilizando 'foreach' para pegar as informações '$chave' e '$valor' de cada linha -->
        <tr>        <!-- linha -->
            <th><?php echo $chave; ?></th>       <!-- coluna ultilizando 'th' para deixar em negrito -->
            <td><?php echo $valor; ?></td>
        </tr>
    <?php endforeach; ?>
</table>