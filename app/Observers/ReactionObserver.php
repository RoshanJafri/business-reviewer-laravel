<?php

namespace App\Observers;

use App\ReviewReaction;

class ReactionObserver
{
    /**
     * Handle the review reaction "created" event.
     *
     * @param  \App\ReviewReaction  $reviewReaction
     * @return void
     */
    public function created(ReviewReaction $reviewReaction)
    {
    }

    /**
     * Handle the review reaction "updated" event.
     *
     * @param  \App\ReviewReaction  $reviewReaction
     * @return void
     */
    public function updated(ReviewReaction $reviewReaction)
    {
        //
    }

    /**
     * Handle the review reaction "deleted" event.
     *
     * @param  \App\ReviewReaction  $reviewReaction
     * @return void
     */
    public function deleted(ReviewReaction $reviewReaction)
    {
        //
    }

    /**
     * Handle the review reaction "restored" event.
     *
     * @param  \App\ReviewReaction  $reviewReaction
     * @return void
     */
    public function restored(ReviewReaction $reviewReaction)
    {
        //
    }

    /**
     * Handle the review reaction "force deleted" event.
     *
     * @param  \App\ReviewReaction  $reviewReaction
     * @return void
     */
    public function forceDeleted(ReviewReaction $reviewReaction)
    {
        //
    }
}