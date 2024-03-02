<?php 
$nome = $_POST['nome'];     // 'variável' $nome reçebe e armazena o dado 'nome' do formulário, nas variáveis abaixo acorre a mesma coisa
$email = $_POST['email'];
$senha = $_POST['senha'];
$reptsenha = $_POST['reptsenha'];
$lembrete = $_POST['lembrete'];
$foto = $_FILES['foto']['name'];        // colocando o nome do campo 'foto' e 'name' que indica que o que está sendo pego é o nome do arquivo
$tipo = $_FILES['foto']['type'];            // pegando o tipo 'type' do campo 'foto'

// verificando se os 'valores prenchidos' no formulário estão 'chegando' neste arquivo casdastrar.php

echo "Nome: ". $nome. "</br>";
echo "Email: ". $email. "</br>";
echo "Senha: ". $senha. "</br>";
echo "Repetição da denha: ". $reptsenha. "</br>";
echo "Lembrete: ". $lembrete. "</br>";
echo "Foto: ". $foto. "</br>";
echo "Tipo: ". $tipo. "</br>";