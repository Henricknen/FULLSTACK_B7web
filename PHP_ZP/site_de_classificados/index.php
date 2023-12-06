<?php require 'pages/header.php'; ?>

    <div class="container-fluid">
        
        <div class="jumbotron">     <!-- 'jumbotron' exibindo informações sobre anúncios e usuários cadastrados -->
            <h2>Nós temos hoje 999 anúncios.</h2>
            <p>E mais de 999 usuários cadastrados.</p>
        </div>

        <div class="row">       <!-- divisão em duas colunas: pesquisa avançada e últimos anúncios -->
            <div class="col-sm-3">      <!-- coluna para pesquisa avançada -->
                <h4>Pesquisa avançada</h4>
            </div>      <!-- aqui você pode adicionar elementos relacionados à pesquisa avançada -->

            <div class="col-sm-9">      <!-- coluna para os últimos anúncios -->
                <h4>Últimos anúncios</h4>       <!-- aqui você pode adicionar elementos relacionados aos últimos anúncios -->
            </div>
        </div>
    </div>

<?php require 'pages/footer.php'; ?>
