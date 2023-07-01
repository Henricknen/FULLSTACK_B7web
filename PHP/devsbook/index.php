<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);     // instançiando 'Auth'
$userInfo = $auth->checkToken();       // 'checkToken' retorna as informações do usuário
$activeMenu = 'home';

$page = intval(filter_input(INPUT_GET, 'p'));       // pegando informações de páginação
if($page < 1) {
    $page = 1;
}

$postDao = new PostDaoMysql($pdo);
$info = $postDao->getHomeFeed($userInfo-> id, $page);       // pegando o 'feed'
$feed = $info['feed'];
$pages = $info['pages'];
$currentPage = $info['currentPage'];

require 'partials/header.php';      //puxando arquivo 'header.php' que se encontra na pasta 'partials'
require 'partials/menu.php';
?>
<section class="feed mt-10"> <!-- 'section' é onde começa a área toda da página -->
    <div class="row">
        <div class="column pr-5">

            <?php require 'partials/feed-editor.php'; ?>

            <?php foreach ($feed as $item) : ?>     <!-- loop mostra os 'feed' existentes -->
                <?php include 'partials/feed-item.php'; ?>
            <?php endforeach; ?>

            <div class="feed-pagination">       <!-- criando a exibição das páginas -->
                <?php for($q = 0; $q < $pages; $q++): ?>
                    <a class="<?($q +1 == $currentPage) ?'active' : '' ?>" href="<?= $base ?>/p=<?= $q + 1 ?>"><?= $q + 1 ?></a>
                <?php endfor; ?>
            </div>

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
                    Criado com ❤️ por Luis HenriquE S F
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require 'partials/footer.php';
?>