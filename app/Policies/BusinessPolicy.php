<?php

namespace App\Policies;

use App\User;
use App\Business;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinessPolicy
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

    public function addReview(User $user, Business $business)
    {
        return !$user->ownerOf($business) && !$business->reviewedAlready();
    }

    public function update(User $user, Business $business)
    {
        return $user->ownerOf($business);
    }
}