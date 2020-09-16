<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewShowcaseController extends Controller
{
    public function store(Review $review)
    {

        $this->authorize('update', $review->business);

        if ($showcasedReview = $review->business->reviews()->where('showcased', true)->first()) {
            $showcasedReview->update(['showcased' => false]);
        }

        $review->update(['showcased' => true]);
        return redirect($review->business->path());
    }
}