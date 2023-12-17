<?php
interface RenderableInterface {     // interfaçe 'RenderableInterface' que todos objetos partiçiparão
    public function render();
}

class Form implements RenderableInterface {
    private $elements;      // grava os elementos adiçionados

    public function addElement(RenderableInterface $element) {      // método reçebe um objeto que é da interfaçe 'RenderableInterface'
        $this-> elements[] = $element;
    }

    public function render() {
        $html = '<form>';       // render acumulando um 'html' que iniçiando com 'form'

        foreach($this-> elements as $element) {     // dando um 'foreach' em cada elemento do array 'elements'
            $html .= $element-> render();
        }

        $html .= '</form>';

        return $html;
    }
}

class Label implements RenderableInterface {
    private $text;
    public function __construct($text) {        // classe 'Label' reçebe um texo no construtor
        $this-> text = $text;       // salvando o texto reçebido
    }

    public function render() {      // render tranforma o texto em 'html' de verdade
        return '<label>'. $this-> text .'</label><br/>';
    }
}

class InputText implements RenderableInterface {
    private $name;
    private $type;
    public function __construct($name, $type = 'text') {
        $this-> name = $name;
        $this-> type = $type;
    }

    public function render() {      // render tranforma o texto em 'html' de verdade
        return '<input type="'. $this-> type.'" name="'. $this-> name. '" /><br/>';
    }
}

class SubmitButton implements RenderableInterface {
    private $text;
    public function __construct($text) {
        $this-> text = $text;
    }

    public function render() {
        return '<input type="submit" value= "'. $this-> text. '" />';
    }
}