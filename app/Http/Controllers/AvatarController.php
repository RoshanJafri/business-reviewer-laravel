<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AvatarController extends Controller
{

    public function store(User $user)
    {
        $this->authorize('update', $user);

        request()->validate([
            'avatar' => ['required', 'file']
        ]);

        if ($user->avatar) {
            $user->removeAvatar();
        }

        $user->addAvatar(request('avatar'));

        return back();
    }

    public function delete(User $user)
    {
        $this->authorize('update', $user);
        if ($user->avatar) {
            $user->removeAvatar();
        }

        return back();
    }
}