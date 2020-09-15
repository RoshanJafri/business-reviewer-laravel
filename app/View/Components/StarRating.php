<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{

    public $string = '';
    public $rating;
    public $small = false;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rating, $string = null, $small = null)
    {
        $this->small = isset($small);
        $this->rating = $rating;
        $this->string = $string;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.star-rating');
    }
}