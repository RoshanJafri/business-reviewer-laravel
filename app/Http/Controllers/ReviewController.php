<?php

namespace App\Http\Controllers;

use App\Review;
use App\Business;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Business $business)
    {
        $this->authorize('addReview', $business);

        $attributes = request()->validate([
            'body' => ['required', 'string'],
            'rating' => ['required', 'integer'],
            'image' => ['file', 'nullable']
        ]);


        isset($attributes['image']) ?
            $business->addReview($attributes['body'], $attributes['rating'], $attributes['image']) :
            $business->addReview($attributes['body'], $attributes['rating']);

        return redirect($business->path());
    }
}