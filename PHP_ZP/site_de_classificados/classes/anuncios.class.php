<?php
class Anuncios {

    public function getMeusAnuncios() {
        global $pdo;
        $sql = $pdo-> prepare("SELECT *, (select anuncios.imagens.url from anuncios.imagens where anuncios.imagens.id.anuncio = anuncio.id limit 1) as url FROM anuncios WHERE id_usuario = id_usuario");
        $sql = bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql-> execute();

        if($sql-> rowCount() > 0) { // verificando se houve resultado
            $array = $sql-> fetchAll();
        }

        return $array;
    }

}