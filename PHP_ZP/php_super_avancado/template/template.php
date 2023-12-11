<?php        // arquivo da 'classe' template

class Template {

    private $html;
    public function __construct($file) {     // criando construtor  e passando o template como parâmetro
        if(file_exists($file)) {
            $this-> html = file_get_contents($file);        // se o arquivo existir será armazenado na variável '$html'
        }
    }

    public function render($array) {        // função que irá 'renderizar'
        foreach($array as $chave=> $valor) {        // pegando a "chave" e o "valor"
            $this-> html = str_replace('{'. $chave. '}', $valor, $this-> html);     // substituindo a 'chave' pelo 'valor' no proprio html em cada loop do array
        }

        echo $this-> html;

    }
}

?>