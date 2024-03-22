<div id = "conteudo_pricipal">
    <h1 class = "titulos">Página de Postagens</h1>
    <?php
    include "connect.php";      // fazendo a inclusão do arquivo de conexão com banco de dados
    $sql = mysqli_query($link, "select * from tb_postagens where page = 1 order by id_post desc");       // consultando todos os registros da tabela 'tb_postegens'
    while($line = mysqli_fetch_array($sql)) {          // enquanto variável $line reçeber o que vier da consulta
        $titulo = $line['titulo'];       // armazenará em variáveis
        $imagem = $line['imagem'];
        $conteudo = $line['texto'];
        $data = $line['dt'];
        $id_post = $line['id_post'];
        $hora = $line['hr'];
    ?>

    <div class = "postagens">       <!-- este conteúdo será gerado enquanto o loop 'encontrar registros' na tabela tb_postagens -->
        <h1 class = "titulos"><?php echo $titulo; ?></h1>
        <img src = "postagem/<?php echo "post". $id_post. "/". $imagem; ?>" class = "imagem">
        <p class = "paragrafo"><?php echo $conteudo; ?></p>
        <span class = "data"><?php echo date('d/m/Y', strtotime($data));
            echo "<br>". date('H:i', strtotime($hora));
        ?></span>
    </div>
    
    <?php
    }       // 'finalização' do loop while
    ?>

</div>

<div id = "recentes">
    <h1 class = "titulos">Recentes</h1>
    <div class = "postagens_recentes">
        <h1 class = "titulos"><a href="#">Titulo dos arquivos recentes</a></h1>
        <span class = "data">26/02/2024</span>
    </div>
</div>