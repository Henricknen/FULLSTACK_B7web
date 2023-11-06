<?php

include 'contato.class.php';        // incluindo o arquivo 'contato.class.php'

$contato = new Contato();       // intançiando a classe 'Contato' em um objeto chamado '$contato'

        // CREATE
$contato-> adicionar('l.henrick@live.com', 'Luis Henrique Silva Ferreira');     // 'criando' contato
$contato-> adicionar('l.henrick@live.co', 'LHSF');
$contato-> adicionar('l.henrick@hotmail.com', 'email inexistente');

        // READ
$nome = $contato-> getNome('l.henrick@live.com');       // pegando nome do contato cujo 'email' está sendo passado como parâmetro
echo "Nome: ". $nome. "<br/>";

$lista = $contato-> getAll();       // pegando a lista 'total' dos contatos
print_r($lista);        // 'print_r' para mostrar o array inteiro

        // UPDATE
$contato-> editar('Full Stack', 'l.henrick@live.co');       // atualizando nome para 'Full Stack' no contato de email 'l.henrick@live.co'

$nome = $contato-> getNome('l.henrick@live.co');
echo "Programador: ". $nome. "<br/>";

        // DELETE
$excluir = $contato-> excluir('l.henrick@hotmail.com');        // variável '$excluir' com uma chamada de exclusão, exçluindo contato pelo 'email' passado como parâmetro

if($excluir == true) {      // verificação de 'exclusão'
    echo "foi excluido com sucesso...";
} else {
    echo "Não houve exclusão...";
}

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