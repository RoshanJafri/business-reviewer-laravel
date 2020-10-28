<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewShowcaseController extends Controller
{
    public function store(Review $review)
    {

        $this->authorize('update', $review->business);

        // if ($showcasedReview = $review->business->reviews()->where('showcased', true)->first()) {
        //     $showcasedReview->update(['showcased' => false]);
        // }

        $review->update(['showcased' => true]);
        return redirect($review->business->path());
    }

     public function remove(Review $review)
    {

        $this->authorize('update', $review->business);

        $review->update(['showcased' => false]);
        
        return redirect($review->business->path());
    }
}