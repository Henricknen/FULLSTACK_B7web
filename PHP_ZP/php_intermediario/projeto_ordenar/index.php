<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost","root","");     // conexão com banco de dados
} catch(Exception $e) {
    echo "Error: ". $e->getMessage();
    exit;
}

if(isset($_GET['ordem']) && empty($_GET['ordem']) == false) {       // verificando se houve o envio da 'ordem'
    $ordem = addslashes($_GET['ordem']);        // armazenando na variável 'ordem'
    $sql = "SELECT * FROM usuarios ORDER BY ". $ordem;
} else {
    $ordem = '';
    $sql = "SELECT * FROM usuarios";
}

?>

<form method = "GET">       <!-- 'form' sem action envia os dados para está própria página -->
    <select name = "ordem" onchange = "this.form.submit()">       <!-- ao fazer alguma coisa 'onchange', envia 'this.form.submit' o próprio formúlario -->
        <option></option>
        <option value = "nome" <?php echo ($ordem == "nome") ? 'selected = "selected"': ''; ?>>Pelo nome</option>        <!-- ' echo ($ordem == "nome") ? 'selected = "selected"': '';' deixa o item seleçionado -->
        <option value = "idade" <?php echo ($ordem == "idade") ? 'selected = "selected"': ''; ?>>Pelo idade</option>
    </select>
</form>

<table border="1" width="400">      <!-- tabela mostrará os nome e idade dos usuários do banco de dados -->
    <tr>
        <th>Nome</th>
        <th>Idade</th>
    </tr>
    <?php

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