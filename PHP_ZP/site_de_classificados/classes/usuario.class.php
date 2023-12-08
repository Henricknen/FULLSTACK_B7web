<?php

class Usuarios {

    public function cadastrar($nome, $email, $senha, $telefone) {
        global $pdo;
        
        $sql = $pdo-> prepare("SELECT id FROM usuarios WHERE email = :email");       // verifique se o email já está cadastrado
        $sql-> bindValue(":email", $email);
        $sql-> execute();

        if ($sql-> rowCount() == 0) {
            $sql = $pdo-> prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");        // 'adiçionando' usuário no bd
            $sql-> bindValue(":nome", $nome);
            $sql-> bindValue(":email", $email);
            $sql-> bindValue(":senha", md5($senha));
            $sql-> bindValue(":telefone", $telefone);
            $sql-> execute();

            return true;

        } else {
            return false; // Usuário já cadastrado
        }
    }

    
    public function login($email, $senha) {
        global $pdo;
        
        $sql = $pdo-> prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");       // 'verificando' o login
        $sql-> bindValue(":email", $email);
        $sql-> bindValue(":senha", md5($senha));
        $sql-> execute();

        if($sql-> rowCount() > 0) {
            $dado = $sql-> fetch();     // pegando o dado do usuário
            $_SESSION['cLogin'] = $dado['id'];      // salvando o 'id' na seção

            return true;
        } else {
            return false;
        }
    }
}                                          

?>
