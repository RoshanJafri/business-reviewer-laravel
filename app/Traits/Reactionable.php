<?php

namespace App\Traits;

use App\ReviewReaction;
use Illuminate\Support\Facades\DB;

trait Reactionable
{

  public function reactions()
  {
    return $this->hasMany(ReviewReaction::class);
  }

  public function addReaction($type, $user = null)
  {
    return $this->reactions()->create(['user_id' => $user ? $user->id : auth()->id(), 'type' => $type]);
  }

  public function removeReaction($type, $user = null)
  {
    return $this->reactions()->where(['user_id' => $user ? $user->id : auth()->id(), 'type' => $type])->delete();
  }

  public function reactionExists($type, $user = null)
  {
    return $this->reactions()->where(['user_id' => $user ? $user->id : auth()->id(), 'type' => $type])->exists();
  }

  public function isFunnyReactionBy($user = null)
  {
    return $this->reactions()->where(['user_id' => $user ? $user->id : auth()->id(), 'type' => 'funny'])->exists();
  }

  public function isUsefulReactionBy($user = null)
  {
    return $this->reactions()->where(['user_id' => $user ? $user->id : auth()->id(), 'type' => 'useful'])->exists();
  }
}