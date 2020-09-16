<?php

namespace App;

use App\User;
use App\Business;
use DateTimeInterface;
use App\Traits\Reactionable;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    use Reactionable;

    protected $guarded = [];
    public $timestamps = true;
    public $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'review_id');
    }


    public function reply()
    {
        return $this->hasOne(Reply::class);
    }

    public function addReply($body, $user = null)
    {
        return $this->reply()->create(['body' => $body, 'owner_id' => $user ? $user->id : auth()->id()]);
    }


    public function funnyCount()
    {
        return $this->reactions()->where(['type' => 'funny'])->count();
    }
    public function usefulCount()
    {
        return $this->reactions()->where(['type' => 'useful'])->count();
    }
}