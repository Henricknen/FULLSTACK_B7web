<?php
try {
    $pdo = new PDO("mysql:bdname=projeto_tags;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERROR: ". $e-> getMessage();
}

$sql = "SELECT caracteristicas FROM usuarios";      // pegando todas as caracteristicas
$sql = $pdo-> query($sql);
if($sql-> rowCount() > 0) {
    $lista = $sql-> fetchAll();

    $carac = array();

    foreach($lista as $usuario) {
        $palavras = explode(",", $usuario['caracteristicas']);
        foreach($palavras as $palavra) {
            $palavra = trim($palavra);

            if(isset($carac[$palavra])) {
                $carac[$palavra]++;
            } else {
                $carac[$palavra] = 1;
            }
        }
    }
}

$palavras = array_keys($carac);
$contagens = array_values($carac);

$maior = max($contagens);

$tamanhos = array(11, 16, 22,88);

for($x = 0; $x < count($palavras); $x++) {
    $n = $contagens[$x] / $maior;

    $h = ceil($n * count($tamanhos));       // 'ceil' arredonda para cima

    echo "<p style='font-size:". $tamanhos[$h - 1]. "px'>". $palavras[$x]. "</p>";
}

?>