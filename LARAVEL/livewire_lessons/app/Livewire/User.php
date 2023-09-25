<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class User extends Component {

    public $name = 'Luis Henrique';
    public $hookName = 'N/A';
    public $propertyName = 'N/A';
    public $propertyValue = 'N/A';

    public function render() {
        return view('livewire.user');
    }

    public function updated($property, $value) {     // 'hook' roda toda vez que um dado for alterado na view

        $this-> name = ucfirst($this-> name);
        $this-> hookName = 'updated';       // alterando 'hookName'
        $this-> propertyName = $property;
        $this-> propertyValue = $value;
    }

    public function mount(Request $request, $user) {        // método 'mount' com acesso a requisição
        $this-> name = $request-> name;       // reçebendo o nome através da 'requisição'
    }
}
