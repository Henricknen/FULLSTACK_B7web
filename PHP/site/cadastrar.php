<?php 
$nome = $_POST['nome'];     // 'variável' $nome reçebe e armazena o dado 'nome' do formulário, nas variáveis abaixo acorre a mesma coisa
$email = $_POST['email'];
$senha = $_POST['senha'];
$reptsenha = $_POST['reptsenha'];
$lembrete = $_POST['lembrete'];
$foto = $_FILES['foto']['name'];        // colocando o nome do campo 'foto' e 'name' que indica que o que está sendo pego é o nome do arquivo
$tipo = $_FILES['foto']['type'];            // pegando o tipo 'type' do campo 'foto'

// verificando se os 'valores prenchidos' no formulário estão 'chegando' neste arquivo casdastrar.php

// echo "Nome: ". $nome. "</br>";
// echo "Email: ". $email. "</br>";
// echo "Senha: ". $senha. "</br>";
// echo "Repetição da denha: ". $reptsenha. "</br>";
// echo "Lembrete: ". $lembrete. "</br>";
// echo "Foto: ". $foto. "</br>";
// echo "Tipo: ". $tipo. "</br>";

if($nome != "" && $email != "" && $senha != "" && $lembrete != "") {      // verificando se as variáveis não estão vazias
    if($senha != $reptsenha) {      // teste verifica se senhas são iguais
        echo "<script>alert('Senhas diferentes');window.history.go(-1)</script>";     // inserindo um 'javascript' no 'php' 'window' da acesso ao objeto janela 'history' acessa o historico e go(-1) indica que o navegador deve retroceder uma página
    } else {
        echo "Ok";
    }
} else {
    echo "<script>alert('É necessario preencher todos os campos');window.history.go(-1)</script>";
}