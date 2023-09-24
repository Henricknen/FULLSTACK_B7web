<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component {
    public $number = 0;     // propriedade 'number' iniçia em 0
    public function render() {
        return view('livewire.counter');
    }

    public function increment() {
        if($this-> number < 5) {        // codição para 'incrementar'
            $this-> number = $this-> number + 1;       // acreçentando 1 ao number
        }
    }

    public function decrement() {
        if($this-> number > 0) {        // codição para 'decrementar'
            $this-> number = $this-> number - 1;       // dinminuindo 1 ao number
        }
    }
}
