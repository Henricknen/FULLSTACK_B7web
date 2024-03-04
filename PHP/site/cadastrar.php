<?php 

include 'connect.php';     // incluindo o arquivo que 'faz conexão' com o banco de dados

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

$registro = false;
if($nome != "" && $email != "" && $senha != "" && $lembrete != "") {      // verificando se as variáveis não estão vazias
    if($senha != $reptsenha) {      // teste verifica se senhas são iguais
        echo "<script>alert('Senhas diferentes');window.history.go(-1)</script>";     // inserindo um 'javascript' no 'php' 'window' da acesso ao objeto janela 'history' acessa o historico e go(-1) indica que o navegador deve retroceder uma página
    } else {
        $registro = true;       // se todos os campos 'estiferem preenchidos' e 'senha e confirmar senha' forem iguais variável se torna 'true' indicando que usuário esta habilitado ter seu cadastro na tabela do banco de dados
    }
} else {
    echo "<script>alert('É necessario preencher todos os campos');window.history.go(-1)</script>";
}
                        // consultando todos os registros da tabela 'tb_user' em ordem decrescente 'order by'
$sql = mysqli_query($link, "SELECT * FROM tb_user order by id_user desc limit 1");       // função 'mysqli_query' é ultilizada para 'castrar' fazer 'atualização' ou 'deletar' algum registro da tabela do banco de dados
while($line = mysqli_fetch_array($sql)) {       // enquanto variável '$line' estiver reçebendo dados da função 'mysqli_fetch_array'
    $id = $line['id_user'];     // será guardado dentro da variável '$id' o que estiver dentro do campo 'id_user'
    $nome_user = $line['nome'];
}

echo $id;
echo $nome_user;