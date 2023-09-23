<?php

namespace App\Livewire;

use Livewire\Component;

class HelloWord extends Component {
    public $name = 'Luis Henrique Silva Ferreira';      // '$name' propriedade publica do componente
    public $salutation = 'Hello';
    public $salutationOptions = ['Hello', 'Bye Bye'];
    public $color = 'white';

    public function render() {      // método 'render' retornará a view
        return view('livewire.hello-word', [        // array 
            'name'=> 'Luis Henrique Silva Ferreira...',
            'randomNumber'=> ''.rand(0, 99)
        ]);
        return view('livewire.hello-word');
    }
}