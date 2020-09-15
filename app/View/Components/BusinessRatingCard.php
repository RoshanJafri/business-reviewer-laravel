<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BusinessRatingCard extends Component
{

    public $business;
    public $ratingsArray;
    public $totalRatings;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($business)
    {
        $this->business = $business;
        $this->totalRatings = $business->reviews->count();
        $this->ratingsArray = $this->calculatePercentages($business->reviews);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.business-rating-card');
    }

    protected function filterByRating($reviews)
    {
        return array_count_values($reviews->map(function ($review) {
            return $review->rating;
        })->toArray());
    }

    protected function calculatePercentages($reviews)
    {
        $output = [5 => [0, 0], 4 => [0, 0], 3 => [0, 0], 2 => [0, 0], 1 => [0, 0]];

        foreach ($this->filterByRating($reviews) as $rating => $key) {
            $output[$rating] = [$key, ($key / $reviews->count()) * 100];
        }

        return $output;
    }
}