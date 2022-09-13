<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StoreFrontLayout extends Component
{
    public $title;
    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $categories=[])
    {
        $this->title = $title;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.store-front'); 
    }
}
