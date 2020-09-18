<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_authenticated_user_can_view_their_profile()
    {
        $user = $this->signIn();
        $this->get(route('profiles.show', $user->id))->assertSee($user->name);
    }

    public function test_an_authenticated_can_view_other_users_profile()
    {
        $user = $this->signIn();
        $otherUser = factory('App\User')->create();


        $this->get(route('profiles.show', $otherUser->id))->assertSee($otherUser->name);
    }
}