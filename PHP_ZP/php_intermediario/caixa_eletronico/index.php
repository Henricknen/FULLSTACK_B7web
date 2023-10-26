<?php

session_start();        // iniçiando a seção
require 'config.php';
if(isset($_SESSION['banco']) && empty($_SESSION['banco']) == false) {       // se existir a seção 'banco' e ela não estiver vazia
    $id = $_SESSION['banco'];

	$sql = $pdo-> prepare("SELECT * FROM contas WHERE id = :id");
	$sql-> bindValue(":id", $id);
	$sql-> execute();

    if($sql-> rowCount() > 0) {      // verificando se encontrou um usuário com 'id' espeçificado
		$info = $sql-> fetch();
	} else {
		header("Location: login.php");
		exit;
	}
} else {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
</head>
<body>
    <h1>Banco XYX</h1>
    Titular: <?php echo $info['titular']; ?> <br/>
    Agência: <?php echo $info['agencia']; ?><br/>
    Conta: <?php echo $info['conta']; ?><br/>
    <a href="sair.php">Sair</a>
    <hr>
    <h3>MovimentaçãoExtratos</h3>

    <a href="add-transacao.php">Adiçionar transação</a><br><br>

    <table border = "1" width = "400">
        <tr>
            <th>Data</th>
            <th>Valor</th>
        </tr>
        <?php
        $sql = $pdo-> prepare("SELECT * FROM historico WHERE id_conta = :id_conta");     // pegando historico de conta espeçifica
        $sql-> bindValue(":id_conta", $id);
        $sql-> execute();

        if($sql-> rowCount() > 0) {
            foreach($sql-> fetch() as $item) {
                ?>
                <tr>
                    <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                    <td>
                        <?php if($item['tipo' == '0']): ?>
                        <span color = "green"> R$: <?php echo $item['valor'] ?> </span>
                        <?php else: ?>
                        <span color = "red"> -R$: <?php echo $item['valor'] ?> </span>
                        <?php endif; ?>
                    <td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</body>
</html>