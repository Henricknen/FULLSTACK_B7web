<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
</head>
<body>
    <form action = "login.php" method = "post">
        <label for=  "username">Usuário:</label>
        <input type = "text" name = "usuario"><br>
        <label for=  "password">Senha:</label>
        <input type=  "password" name = "password"><br>
        <label for = "lembrar">Tema Preferido: </label>
        <select name = "tema">
            <option value = "escuro">Escuro</option>
            <option value = "claro">Claro</option>
        </select><br>
        <input type = "submit" value = "Login">
    </form>
</body>
</html>