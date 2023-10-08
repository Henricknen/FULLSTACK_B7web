<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class hero extends Component {

    public $states;     // propriedades públicas
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct() {
        
        $this-> states = [      // populando 'states'
            ['value'=> 'RJ', 'name'=> 'Rio de Janeiro'],
            ['value'=> 'SP', 'name'=> 'Sao Paulo'],
            ['value'=> 'MG', 'name'=> 'Minas Gerais']
        ];

        $this-> categories = [
            ['value'=> 'categoria1', 'name'=> 'Categoria1'],
            ['value'=> 'categoria2', 'name'=> 'Categoria2'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.hero');
    }
}
