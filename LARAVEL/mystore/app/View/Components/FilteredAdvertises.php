<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilteredAdvertises extends Component {

    public $advertisesList;
    /**
     * Create a new component instance.
     */
    public function __construct() {
        
        $this-> advertisesList = [
            
            [
                'image'=> 'http://pllaceholder.it/145x145',
                'title'=> 'Tenis',
                'price'=> 'R$ 189,90',
                'href'=> '#'
            ],
            
            [
                'image'=> 'http://pllaceholder.it/145x145',
                'title'=> 'Tenis',
                'price'=> 'R$ 189,90',
                'href'=> '#'
            ],
            
            [
                'image'=> 'http://pllaceholder.it/145x145',
                'title'=> 'Tenis',
                'price'=> 'R$ 189,90',
                'href'=> '#'
            ],
            
            [
                'image'=> 'http://pllaceholder.it/145x145',
                'title'=> 'Tenis',
                'price'=> 'R$ 189,90',
                'href'=> '#'
            ],
            
            [
                'image'=> 'http://pllaceholder.it/145x145',
                'title'=> 'Tenis',
                'price'=> 'R$ 189,90',
                'href'=> '#'
            ],
            
            [
                'image'=> 'http://pllaceholder.it/145x145',
                'title'=> 'Tenis',
                'price'=> 'R$ 189,90',
                'href'=> '#'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.filtered-advertises');
    }
}
