<?php

namespace App\Observers;

use App\Review;
use App\Business;

class ReviewObserver
{
    /**
     * Handle the review "created" event.
     *
     * @param  \App\Review  $review
     * @return void
     */
    public function created(Review $review)
    {
        // update rating of business
        $business = Business::where('id', $review->business_id)->first();

        $business->update([
            'average_review' =>
            intval(ceil($business->reviews->sum('rating') / $business->reviews->count('rating')))
        ]);

        $user = auth()->user();
        $user->increment('review_count');
        $user->update(['average_rating' => round($user->reviewAverage(), 1)]);
    }
    /**
     * Handle the review "updated" event.
     *
     * @param  \App\Review  $review
     * @return void
     */
    public function updated(Review $review)
    {
        //
    }

    /**
     * Handle the review "deleted" event.
     *
     * @param  \App\Review  $review
     * @return void
     */
    public function deleted(Review $review)
    {
        //
    }

    /**
     * Handle the review "restored" event.
     *
     * @param  \App\Review  $review
     * @return void
     */
    public function restored(Review $review)
    {
        //
    }

    /**
     * Handle the review "force deleted" event.
     *
     * @param  \App\Review  $review
     * @return void
     */
    public function forceDeleted(Review $review)
    {
        //
    }
}