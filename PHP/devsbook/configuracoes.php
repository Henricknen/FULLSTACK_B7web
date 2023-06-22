<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth-> checkToken();
$activeMenu = 'config';

$userDao = new UserDaoMysql($pdo);

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class = "feed mt-10">

    <h1>Configurações</h1>

    <form method = "POST" class = "config-form" enctype = "multipart/form-data" action = "configuracoes_action.php">
        <label>
            Novo Avatar: <br/>
            <input type = "file" name = "avatar"/><br/>      <!-- campo de trocar as fotos -->

            <img class="mini" src = "<?= $base; ?>/media/avatars/<?= $userInfo-> avatar; ?>"/>
        </label>

        <label>
            Nova Capa: <br/>
            <input type = "file" name = "cover"/><br/>      <!-- campo de trocar as fotos -->
            
            <img class="mini" src = "<?= $base; ?>/media/covers/<?= $userInfo-> cover; ?>"/>
        </label>

        <hr><!-- informações padrão do usuário -->
        <label>
            Nome completo: <br/>
            <input type=  "text" name = "name" value = "<?= $userInfo-> name; ?>"/>
        </label>
        
        <label>
            E-mail: <br/>
            <input type=  "email" name = "email" value = " <?= $userInfo-> email; ?>"/>
        </label>

        <label>
            Data de nascimento: <br/>
            <input type=  "text" id = "birthdate" name = "birthdate" value = "<?= date('d/m/Y', strtotime($userInfo-> birthdate)); ?>"/>       <!-- 'date('d/m/Y', strtotime())' é uma mascará que permite a formatação da data no padrão brasileiro -->
        </label>

        <label>
            Cidade: <br/>
            <input type=  "text" name = "city" value = "<?= $userInfo-> city; ?>"/>
        </label>
        
        <label>
            Trabalho: <br/>
            <input type=  "text" name = "work" value = "<?= $userInfo-> work; ?>"/>
        </label>

        <hr>

        <label>
            Nova senha: <br/>
            <input type=  "password" name = "password"/>
        </label>

        <label>
            Confirmar nova senha: <br/>
            <input type=  "password" name = "password_confirmation"/>
        </label>

        <button class="button">Salvar</button>
    </form>

</section>
<script src = "https://unpkg.com/imask"></script>       <!-- plugin javascript 'imask'  é usado para criar e aplicar máscaras em campos de entrada -->
<script>
    IMask(      // função 'IMask' ultiliza dois parâmentros
        document.getElementById("birthdate"),       // 1º campo a qual será colcado o efeito
        {mask: '00/00/0000'}        // 2º máscara de uma data
    );
</script>
<?php
require 'partials/footer.php';
?>