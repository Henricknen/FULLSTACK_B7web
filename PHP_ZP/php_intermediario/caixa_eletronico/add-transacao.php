<?php
session_start();        // iniçiando a seção
require 'config.php';

if(isset($_POST['tipo'])) {       // fazendo o tratamento dos dados reçebidos do formulário
    $tipo = $_POST['tipo'];
    $valor = str_replace(",", ".", $_POST['valor']);        // 'str_replace' troca os valores espeçificados ddntra das " "
    $valor = floatval($valor);

    $sql = $pdo-> prepare("INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW())");     // inserindo dados no historico
    $sql-> bindValue(":id_conta", $_SESSION['banco']);
    $sql-> bindValue(":tipo", $tipo);
    $sql-> bindValue(":valor", $valor);
    $sql-> execute();

    if($tipo == 0) {
        $sql = $pdo->prepare("UPDATE contas SET saldo = saldo + :valor WHERE id = :id");       // fazendo atualização apos depósito
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    
    } else {
        $sql = $pdo->prepare("UPDATE contas SET saldo = saldo - :valor WHERE id = :id");
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<body>
    <form method="POST">
    Tipo de Transação: <br>
    <select name="tipo">
        <option value="0">Deposito</option>
        <option value="1">Retirada</option>
    </select><br><br>

    Valor: <br>
    <input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>      <!-- 'pattern="[0-9.,]{1,}"' qual padrão de dados é aceito neste campo -->
    <input type="submit" value="Adiçionar">
    </form>
</body>
</html>