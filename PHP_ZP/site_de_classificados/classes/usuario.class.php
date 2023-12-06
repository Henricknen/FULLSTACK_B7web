
<?php

class Usuarios {
    public function cadastrar($nome, $email, $senha, $telefone) {
        global $pdo;
        $this-> email = $email;      // define a propriedade 'email' da classe com o valor passado como parâmetro

        $stmt = $pdo-> prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)");        // preparando a declaração SQL

        if ($stmt) {        // verifique se a preparação foi bem-sucedida
            
            $stmt->execute([':nome' => $nome, ':email' => $email, ':senha' => $senha, ':telefone' => $telefone]);

            $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");       // verifique se o email já está cadastrado
            $sql->bindValue(":email", $email);
            $sql->execute();

            if ($sql->rowCount() == 0) {
                return true; // Usuário cadastrado com sucesso
            } else {
                return false; // Usuário já cadastrado
            }
        } else {            
            echo "Erro ao preparar a declaração SQL.";      // caso em que a preparação falhou
        }
    }
}

?>
