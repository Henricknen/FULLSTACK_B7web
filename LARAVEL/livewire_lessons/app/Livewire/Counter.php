<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component {
    public $number = 0;     // propriedade 'number' iniçia em 0
    public function render() {
        return view('livewire.counter');
    }

    public function increment($quantity) {
        $this-> number = $this-> number + $quantity;       // acreçentando 1 ao number
    }
}
