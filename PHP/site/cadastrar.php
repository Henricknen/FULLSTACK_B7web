<?php 

include 'connect.php';     // incluindo o arquivo que 'faz conexão' com o banco de dados

$nome = $_POST['nome'];     // 'variável' $nome reçebe e armazena o dado 'nome' do formulário, nas variáveis abaixo acorre a mesma coisa
$email = $_POST['email'];
$senha = $_POST['senha'];
$reptsenha = $_POST['reptsenha'];
$lembrete = $_POST['lembrete'];
$foto = $_FILES['foto']['name'];        // colocando o nome do campo 'foto' e 'name' que indica que o que está sendo pego é o nome do arquivo
$tipo = $_FILES['foto']['type'];            // pegando o tipo 'type' do campo 'foto'

echo "Tipo: $tipo<br>";

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
$pasta = "user". $id;
if(file_exists("user/". $pasta)) {       // função 'file_exists' verifica se a variável '$pasta' que contém o 'id' do usuário já existe
    echo "<script>alert('Essa pasta já existe...');</script>";       // depois da menssagem de pasta existente
} else {
    mkdir("user/". $pasta, 0777);        // entrando na pasta 'user' e dentro dela criando uma pasta chamada 'user' com o 'id' do usuário cadastrado
    echo "<script>alert('A pasta ". $pasta. " foi criada com sucesso...');</script>";
}

$formatos = array(1=> 'image/png', 2=> 'image/jpg', 3=> 'image/jpeg', 4=> 'image/gif');     // array de arquivos permitidos

$foto = str_replace(" ", "_", $foto);      // função 'str_replace' substitui a string indesejada por outra string
$foto = strtolower($foto);

$teste = array_search($tipo, $formatos);        // função 'array_search' procura por um tipo espeçifico
if($teste == true) {
    move_uploaded_file($_FILES['foto']['tmp_name'], "user/". $pasta. "/". $foto);       // função 'move_uploaded_file' é quem faz o 'upload' das imagens reçebendo dois argumentos o 'primeiro' informa o nome do arquivo e o 'segundo' é o local onde o arquivo será guardado
} else {
    echo "<script>alert('Tipo de arquivo não é suportado...');</script>";
}

$dt = date('Y-m-d');
$hr = date('H:i:s');

if($registro == true) {
    mysqli_query($link, "INSERT INTO tb_user(nome, email, senha, lembrete, foto, nivel, dt, hr) VALUES
    ('$nome', '$email', '$senha', '$lembrete', '$foto', 5, '$dt', '$hr')");            // fazendo cadastro do usuário na tabela 'tb_user'
    echo "<script>alert('Usuario cadastrado com sucesso...'); window.location.href='index.php';</script>";
} else {
    echo "<script>window.history.go(-1);</script>";
}
