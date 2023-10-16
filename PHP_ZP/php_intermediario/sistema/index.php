<?php
    require 'config.php';       // importando o arquivo de configurações 'config.'php
?>
<a href="adicionar.php">Adiçionar usuário</a>
<table border = "0" width = "100%">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php
        $sql = "SELECT * FROM usuarios";  // buscando as informações d tabela 'usuarios' do banco de dados
        $sql = $pdo-> query($sql);
        if($sql-> rowCount() > 0) {      // fazendo uma verificação
            foreach($sql-> fetchAll() as $usuario) {     // pegando todos os resultados e inserindo em 'usuário'
                echo '<tr>';
                echo '<td>'. $usuario['nome']. '</td>';
                echo '<td>'. $usuario['email']. '</td>';
                echo '<td><a href = "editar.php? id ='. $usuario['id'].'">Editar</a> - <a href = "excluir.php? id ='. $usuario['id'].'">Excluir</a></td>';
                echo '<tr>';
            }
        }
    ?>
</table>