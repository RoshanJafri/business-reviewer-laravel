<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['viewer_id'];

    public function viewable()
    {
        return $this->morphTo();
    }

    public function viewer()
    {
        return $this->belongsTo(User::class, 'viewer_id');
    }
}