<?php

require 'config.php';

$sql = "SELECT * FROM filmes";      // 'listando' filmes da tabela do voanco de dados
$sql = $pdo-> query($sql);
if($sql-> rowCount() > 0) {
    foreach($sql-> fetchAll() as $filme):       // se houver algum filme será feita a listagem
    ?>
    <fieldset>
        <strong><?php echo $filme['titulo']; ?></strong>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=1"></a><img src="img/estrela.png" height = "20"/></a>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=2"><img src="img/estrela.png" height = "20"/></a>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=3"><img src="img/estrela.png" height = "20"/></a>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=4"><img src="img/estrela.png" height = "20"/></a>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=5"><img src="img/estrela.png" height = "20"/></a>
        <?php echo $filme['media']; ?>
    </fieldset>
    <?php
    endforeach;
} else {
    echo "Não há filmes cadastrados...";
}