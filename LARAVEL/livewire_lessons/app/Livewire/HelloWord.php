<?php

namespace App\Livewire;

use Livewire\Component;

class HelloWord extends Component
{
    public function render() {      // método 'render' retornará a view
        return view('livewire.hello-word', [        // array 
            'name'=> 'Luis Henrique Silva Ferreira...',
            'randomNumber'=> ''.rand(0, 99)
        ]);
    }
}
