<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost","root","");     // conexão com banco de dados
} catch(Exception $e) {
    echo "Error: ". $e->getMessage();
    exit;
}

?>

<table border="1" width="400">      <!-- tabela mostrará os nome e idade dos usuários do banco de dados -->
    <tr>
        <th>Nome</th>
        <th>Idade</th>
    </tr>
    <?php
    $sql = "SELECT * FROM usuarios";        // consulta
    $sql = $pdo-> query($sql);
    if($sql-> rowCount() > 0) {
        foreach($sql-> fetchAll() as $usuario):
        
            ?>
            
            <tr>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['idade']; ?></td>
            </tr>

            <?php

        endforeach;
    }
    ?>
</table>