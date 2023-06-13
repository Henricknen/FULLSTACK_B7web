<?php
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base);     // instançiando 'Auth'
$userInfo = $auth-> checkToken();       // 'checkToken' retorna as informações do usuário

require 'partials/header.php';      //puxando arquivo 'header.php' que se encontra na pasta 'partials'
require 'partials/menu.php';
?>
<section class="feed mt-10">        <!-- 'section' é onde começa a área toda da página -->
...
</section>
<?php
require 'partials/footer.php';
?>