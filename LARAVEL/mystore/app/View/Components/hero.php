<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class hero extends Component {

    public $states;      // propriedades
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct() {
        $this-> states = [      // passando alguns estados fixos
            ['value'=> 'AC', 'name'=> 'ACRE'],
            ['value'=> 'MG', 'name'=> 'MINAS GERAIS'],
            ['value'=> 'SP', 'name'=> 'SAO PAULO'],
        ];
        
        $this-> categories = [
            ['value'=> 'Categoria1', 'name'=> 'Categoria 1'],
            ['value'=> 'Categoria2', 'name'=> 'Categoria 2'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.hero');
    }
}
