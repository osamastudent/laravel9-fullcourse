<?php

namespace App\View\Components;

use Illuminate\View\Component;

class testcomponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $pass;
    public $email;
    public function __construct($pass,$email)
    {
        $this->pass=$pass;
        $this->email=$email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.testcomponent');
    }
}
