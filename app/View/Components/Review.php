<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Review extends Component
{

    public $review, $business;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($review, $business)
    {
        $this->review = $review;
        $this->business = $business;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.review');
    }
}