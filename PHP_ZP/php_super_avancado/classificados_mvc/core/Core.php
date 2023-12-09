<?php       // 'core' da o iniçio da estrutura 'mvc'
class Core {

    public function run() {     // função 'run' que fará iniçicar

        $url = '/';     // '/' será a url padrão
        if(isset($_GET['url'])) {
            $url .= $_GET['url'];       // concatenação da url padrão com a que foi enviada
        }

        if(isset($url) && $url != '/') {        // se foi enviado alguma 'url'
            $url = explode('/', $url);
            array_shift($url);     // 'array_shift' remove o primeiro registro do array que não serve para nada

            $currentController = $url[0]. 'Controller';     // 'currentController' controller atual
            array_shift($url);

            if(isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
            } else {
                $currentAction = 'index';
            }

            print_r($url);

        } else {        // se não enviado nada 'controller' e 'action' padrão será setado
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        echo '<hr/>';
        echo "CONTROLLER: ". $currentController. "<br>/";
        echo "ACTION: ". $currentAction. "<br/>";

    }

}