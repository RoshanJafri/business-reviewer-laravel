<?php

namespace App\Policies;

use App\User;
use App\Review;
use App\Business;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showcase(User $user, Review $review)
    {
        $business = $review->business;
        return !$business->reviews()->where('showcased',  true)->exists() && $user->ownerOf($business);
    }

    public function reply(User $user, Review $review)
    {
        return $user->ownerOf(Business::where('id', $review->business_id)->first());
    }
}