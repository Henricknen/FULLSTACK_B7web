<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_filtro_tabela;host=localhost", "root", "");        // conexão com 'banco de dados'
} catch(PDOException $e) {
    echo "ERRO: " . $e->getMessage();    
}

?>
<table border="1" width="100">      <!-- tabela HTML para exibir dados do banco de dados -->
    
<tr>        <!-- Cabeçalhos da tabela -->
        <th>Nome</th>
        <th>Sexo</th>
        <th>Idade</th>
    </tr>
    <?php
    $sexos = array(     // array associativo para mapear códigos de sexo para seus respectivos valores
        '0' => 'Masculino',
        '1' => 'Feminino'
    );

    $sql = "SELECT * FROM usuarios";        //  selecionando todos os registros da tabela 'usuarios'

    $result = $pdo->query($sql);

    if ($result) {      // verificando se a consulta foi bem-sucedida
        $usuarios = $result->fetchAll();

        if (count($usuarios) > 0) {        // verificando se existem registros para exibir na tabela
            foreach ($usuarios as $usuario) {            // 'loop' através dos registros e exibe cada um na tabela
                ?>
                <tr>
                    <td><?php echo $usuario['nome']; ?></td>          <!-- exibindo os dados do usuário em cada célula da tabela -->
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
