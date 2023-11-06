<?php

include 'contato.class.php';        // incluindo o arquivo 'contato.class.php'
$contato = new Contato();       // intançiando a classe 'Contato' em um objeto chamado '$contato'

?>

<h1>Contatos</h1>

<a href="adicionar.php">[ ADICIONAR ]</a><br/><br/>

<table border = "1" width = "600">              <!-- tabela que mostrará todos os contatos -->
        <th>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>AÇÕES</th>
        </th>

        <?php
        
        $lista = $contato-> getAll();    // pegando a lista de 'todos' os contatos
        foreach($lista as $item):               // ultilizando 'foreach' para percorrer a lista e mostra-la na tela para o usuário
        ?>

        <tr>
            <td></td>     <!-- fazendo a listagem de todos os 'itens' do banco de dados -->
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['nome']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $item['id']; ?>">[ EDITAR ]</a>
                <a href="excluir.php?id=<?php echo $item['id']; ?>">[ EXCLUIR ]</a>
            </td>
        </tr>

        <?php endforeach; ?>

</table>