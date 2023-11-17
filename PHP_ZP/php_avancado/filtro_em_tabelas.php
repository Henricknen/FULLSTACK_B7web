<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_filtro_tabela;host=localhost", "root", "");
} catch(PDOExecption $e) {
    echo "ERRO: ". $e-> getMessage();    
}

?>
<table border = "1" width = "100">
    <tr>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Idade</th>
    </tr>
    <?php
    $sexos = array (
        '0' => 'Masculino',
        '1' => 'femininno'
    );
    $sql = "SELECT * FROM usuarios";
    $result = $pdo->query($sql);

    if ($result) {
        $usuarios = $result->fetchAll();

        if (count($usuarios) > 0) {
            foreach ($usuarios as $usuario) {
                ?>
                <tr>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $sexos[$usuario['sexo']]; ?></td>
                    <td><?php echo $usuario['idade']; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "Nenhum usuário encontrado.";
        }
    } else {
        echo "Erro na consulta SQL.";
    }
?>

</table>