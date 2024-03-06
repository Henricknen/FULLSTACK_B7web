<?php 

include 'connect.php';     // incluindo o arquivo que 'faz conexão' com o banco de dados

$nome = $_POST['nome'];     // 'variável' $nome reçebe e armazena o dado 'nome' do formulário, nas variáveis abaixo acorre a mesma coisa
$email = $_POST['email'];
$senha = $_POST['senha'];
$reptsenha = $_POST['reptsenha'];
$lembrete = $_POST['lembrete'];
$foto = $_FILES['foto']['name'];        // colocando o nome do campo 'foto' e 'name' que indica que o que está sendo pego é o nome do arquivo
$tipo = $_FILES['foto']['type'];            // pegando o tipo 'type' do campo 'foto'

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
}

$id = $id + 1;
$pasta = "user". $id;       // variável '$pasta' armazena o 'id' do usuário cadastrado
if(file_exists("user/". $pasta)) {       // função 'file_exists' verifica se a variável '$pasta' que contém o 'id' do usuário já existe
    echo "<script>alert('Essa pasta já existe...'); window.history.go(-1);</script>";       // depois da menssagem de pasta existente 'window.history.go(-1)' faz usuário retornar para o formulário
} else {
    mkdir("user/". $pasta, 0777);        // entrando na pasta 'user' e dentro dela criando uma pasta chamada 'user' com o 'id' do usuário cadastrado
    echo "<script>alert('A pasta ". $pasta. " foi criada com sucesso...');</script>";
}

move_uploaded_file($_FILES['foto']['tmp_name'], "user/". $pasta. "/". $foto);       // função 'move_uploaded_file' é quem faz o 'upload' das imagens reçebendo dois argumentos o 'primeiro' informa o nome do arquivo e o 'segundo' é o local onde o arquivo será guardado