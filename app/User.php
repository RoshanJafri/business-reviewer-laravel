<?php

namespace App;

use App\Review;
use App\Business;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function business()
    {
        return $this->hasOne(Business::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewsCount()
    {
        return $this->reviews()->count();
    }

    public function reviewAverage()
    {
        return $this->reviews()->sum('rating') / $this->reviewsCount();
    }

    public function ownerOf($business)
    {
        return $business->owner_id == auth()->id();
    }
}