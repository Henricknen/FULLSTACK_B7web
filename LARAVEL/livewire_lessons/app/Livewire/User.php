<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class User extends Component {

    public $name = 'Carregando...';

    public function render() {
        return view('livewire.user');
    }

    public function mount(Request $request, $user) {        // método 'mount' com acesso a requisição
        $this-> name = $request-> name;       // reçebendo o nome através da 'requisição'
    }
}
