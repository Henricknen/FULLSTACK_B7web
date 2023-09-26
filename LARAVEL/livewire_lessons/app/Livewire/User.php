<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class User extends Component {

    public $name = 'Luis Henrique';
    public $hookName = [];
    public $propertyName = 'N/A';
    public $propertyValue = 'N/A';

    public function render() {
        return view('livewire.user');
    }

    // public function updated($property, $value) {     // 'hook' roda toda vez que um dado for alterado na view

    //     $this-> name = ucfirst($this-> name);
    //     $this-> hookName = 'updated';       // alterando 'hookName'
    //     $this-> propertyName = $property;
    //     $this-> propertyValue = $value;
    // }

    // public function updating() {     // 'hook' roda enquanto os dados estão sendo atualizadod

    //     $this-> hookName = 'updating';       // alterando 'hookName'
    // }

    public function updatingName() {

        $this-> hookName = 'updating';       // alterando 'hookName'
    }

    public function updatedName() {

        $this-> hookName = 'updatedName';
    }

    public function mount() {
        $this-> hookName = 'mount';
    }

    public function boot() {
        $this-> hookName = 'boot';
    }

    public function booted() {
        $this-> hookName = 'booted';
    }

    public function hydrate() {
        $this-> hookName = 'hydrate';
    }


}
