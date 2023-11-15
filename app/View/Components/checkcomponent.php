<?php

namespace App\View\Components;

use Illuminate\View\Component;

class checkcomponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $pass;
    public function __construct($pass)
    {
        $this->pass=$pass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkcomponent');
    }
}
