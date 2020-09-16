<?php

namespace App\Policies;

use App\User;
use App\Review;
use App\Business;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determines if a review can be replied to by the user
     *
     * @param  \App\User  $user
     * @param  \App\Review  $post
     * @return bool
     */

    public function reply(User $user, Review $review)
    {
        return $user->ownerOf(Business::where('id', $review->business_id)->first());
    }
}