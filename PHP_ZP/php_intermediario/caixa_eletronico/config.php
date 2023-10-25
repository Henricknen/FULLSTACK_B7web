<?php       // arquivo de conexão com banco e dados

try {
    $pdo = new PDO("mysql:dbname=projeto_caixa_eletronico;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "Error: ". $e-> getMessage();
    exit;
}

?>