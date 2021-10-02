<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Directorio extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $directorio;

    public function __construct($directorio)
    {
        //
        $this->directorio=$directorio;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.directorio');
    }
}
