<?php

require 'config.php';

$sql = "SELECT * FROM filmes";      // 'listando' filmes da tabela do voanco de dados
$sql = $pdo-> query($sql);
if($sql-> rowCount() > 0) {
    foreach($sql-> fetchAll() as $filme):       // se houver algum filme será feita a listagem
    ?>
    <fieldset>
        <strong><?php echo $filme['titulo']; ?></strong>
        <img src="img/estrela.png" height = "20"/>
        <img src="img/estrela.png" height = "20"/>
        <img src="img/estrela.png" height = "20"/>
        <img src="img/estrela.png" height = "20"/>
        <img src="img/estrela.png" height = "20"/>
    </fieldset>
    <?php
    endforeach;
} else {
    echo "Não há filmes cadastrados...";
}