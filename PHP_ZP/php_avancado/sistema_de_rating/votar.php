<?php

require 'config.php';

if(!empty($_GET['id']) && !empty($_GET['voto'])) {      // verificando se foi reçebido o 'email' e o 'voto'
    $id = intval($_GET['id']);      // armazenando os valores reçebidos
    $voto = intval($_GET['voto']);      // 'intval' transforma qualquer valor em 'inteiro'

    if($voto >= 1 && $voto <= 5) {

        $sql = $pdo-> prepare("INSERT INTO votos SET id_filme = :id_filme, nota = :nota");      // salvando os votos no banco de dados
        $sql-> bindValue(":id_filme", $id);
        $sql-> bindValue(":nota", $voto);
        $sql-> execute();

        $sql = "UPDATE filmes SET media = (select (SUM(nota)/COUNT(*)) from votos where votos.id_filme = filmes.id) WHERE id = :id";      // calculando a média
        $sql = $pdo-> prepare($sql);
        $sql-> bindValue(":id", $id);
        $sql-> execute();

        header("Location: index.php");
    }

}