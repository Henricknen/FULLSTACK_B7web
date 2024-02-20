<?php 
require 'header.php';

$p = 'home';        // página padrão
if(!empty($_GET['p'])) {        // se existir o get 'p' significa que foi acessado alguma página
    $pagina = $_GET['p'];
    if(strpos($pagina, '.') === false) {        // função 'strpos' está fazendo uma procura por '.' se não encontrar
        if(file_exists('paginas/'.$pagina. '.php')) {       // verifica se arquivo existe
            $p = $pagina;       // substituição o acesso 'get' por '$pagina'
        }
    }
}
require 'paginas/'. $p. '.php';     

require 'footer.php';