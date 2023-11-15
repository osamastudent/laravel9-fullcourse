<?php

namespace App\View\Components;

use Illuminate\View\Component;

class layoutcom extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $myown;
    public function __construct($data)
    {
        $this->myown=$data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layoutcom');
    }
}
