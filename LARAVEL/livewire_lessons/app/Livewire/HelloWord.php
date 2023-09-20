<?php

namespace App\Livewire;

use Livewire\Component;

class HelloWord extends Component {
    public $name = 'Luis Henrique Silva Ferreira';      // '$name' propriedade publica do componente
    public function render() {      // método 'render' retornará a view
        return view('livewire.hello-word');
    }
}
