<?php
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base);     // instançiando 'Auth'
$userInfo = $auth->checkToken();       // 'checkToken' retorna as informações do usuário
$activeMenu = 'home';

require 'partials/header.php';      //puxando arquivo 'header.php' que se encontra na pasta 'partials'
require 'partials/menu.php';
?>
<section class="feed mt-10"> <!-- 'section' é onde começa a área toda da página -->
    <div class="row">
        <div class="column pr-5">

            <?php require 'partials/feed-editor.php'; ?>
            
        </div>
        <div class="column side pl-5">
            <div class="box banners">
            <div class="box-header">
                <div class="box-header-text">Patrocinios</div>
                <div class="box-header-buttons">

                </div>
            </div>
            <div class="box-body">
                <a href=""><img src="https://alunos.b7web.com.br/media/courses/php-nivel-1.jpg" /></a>
                <a href=""><img src="https://alunos.b7web.com.br/media/courses/laravel-nivel-1.jpg" /></a>
            </div>
        </div>
        <div class="box">
            <div class="box-body m-10">
                Criado com ❤️ por B7Web
            </div>
        </div>
        </div>
    </div>
</section>
<?php
require 'partials/footer.php';
?>