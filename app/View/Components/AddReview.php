<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddReview extends Component
{
    public $business;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($business)
    {
        $this->business = $business;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.add-review');
    }
}