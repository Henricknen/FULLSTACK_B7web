<div id = "conteudo_pricipal">
    <!-- <div class = "postagens">
        <h1 class = "titulos">Titulo</h1>
        <img src = "img/php.jpg" class = "imagem">
        <p class = "paragrafo">kadfkldaçdkjdçdj</p>
        <span class = "data">26/02/2024</span>
    </div>
    
    <div class = "postagens">
        <h1 class = "titulos">Titulo</h1>
        <img src = "img/laravel.jpg" class = "imagem">
        <p class = "paragrafo">kadfkldaçdkjdçdj</p>
        <span class = "data">26/02/2024</span>
    </div> -->

    <?php
        include "connect.php";
        $qtde_registros = 1;        // variável indica a quantidade de registros que será exibidos da tabela do banco de dados
        @$page = $_GET['pag'];
        if(!$page) {
            $pagina = 1;        // se variável '$page' estiver vazia é criada uma variável chamada '$pagina' contendo o valor 1
        } else {
            $pagina = $page;
        }

        $inicio = $pagina - 1;
        $inicio = $inicio + $qtde_registros;
        $sel_parcial = mysqli_query($link, "select * from tb_postagens limit $inicio, $qtde_registros");        // fazendo uma busca dentro da tabela 'tb_postagens' limitando a busca ultilizanso 'limit'
        $sel_total = mysqli_query($link, "select * from tb_postagens");     // fazendo uma busca de todos os registros de dentro da tabela

        $contar = mysqli_num_rows($sel_total);      // conta a quantidade de registro da tabela
        $contar_pages = $contar / $qtde_registros;
        echo $contar_pages;
    ?>
</div>

<div id = "recentes">
    <h1 class = "titulos">Recentes</h1>
    <div class = "postagens_recentes">
        <h1 class = "titulos"><a href="#">Titulo dos arquivos recentes</a></h1>
        <span class = "data">26/02/2024</span>
    </div>
</div>