<?php       // arquivo de conexão com banco de dados

try {
    $pdo = new PDO("mysql:dbname=registro;host=localhost","root","");
} catch(PDOException $e) {
    echo "Error: ". $e-> getMessage();
}

?>