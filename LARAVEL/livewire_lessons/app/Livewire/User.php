<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component {

    public $name = 'Carregando...';

    public function render() {
        return view('livewire.user');
    }

    public function mount($user) {
        $this-> name = $user;       // atribuindo propriedade 'name' a 'user' que chega em 'mount'
    }
}
