<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component {
    public $number = 0;     // propriedade 'number' iniçia em 0
    public function render() {
        return view('livewire.counter');
    }

    public function increment() {
        $this-> number = $this-> number + 1;       // acreçentando 1 ao number
    }
}
