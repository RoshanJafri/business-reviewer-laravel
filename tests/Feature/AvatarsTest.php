<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AvatarsTest extends TestCase
{

    use RefreshDatabase;

    public function test_users_can_upload_their_avatar()
    {
        $this->withoutExceptionHandling();
        $user = $this->signIn();
        $avatar = $this->mockImageUpload();

        $this->post(route('profiles.add-avatar', $user->id), ['avatar' => $avatar]);
        $this->assertDatabaseCount('images', 1);
    }

    public function test_authenticated_user_can_only_change_their_avatar()
    {
        $randomUser = factory('App\User')->create();

        $this->signIn();

        $avatar = $this->mockImageUpload();
        $this->post(route('profiles.add-avatar', $randomUser->id), ['avatar' => $avatar])->assertForbidden();
        $this->assertDatabaseCount('images', 0);
    }

    public function test_users_can_change_their_avatar()
    {
        $user = $this->signIn();
        $avatar = $this->mockImageUpload();

        $this->post(route('profiles.add-avatar', $user->id), ['avatar' => $avatar]);
        $this->assertDatabaseCount('images', 1);
        Storage::disk('testing_upload')->assertExists('avatars/' . $avatar->hashName());

        $newAvatar = $this->mockImageUpload();
        $this->post(route('profiles.add-avatar', $user->id), ['avatar' => $newAvatar]);
        Storage::disk('testing_upload')->assertMissing('avatars/' . $avatar->hashName());
        Storage::disk('testing_upload')->assertExists('avatars/' . $newAvatar->hashName());
        $this->assertDatabaseCount('images', 1);
    }

    public function test_users_can_remove_their_avatar()
    {
        $user = $this->signIn();
        $avatar = $this->mockImageUpload();

        $this->post(route('profiles.add-avatar', $user->id), ['avatar' => $avatar]);
        $this->assertDatabaseCount('images', 1);
        Storage::disk('testing_upload')->assertExists('avatars/' . $avatar->hashName());

        $this->delete(route('profiles.remove-avatar', $user->id));
        $this->assertDatabaseCount('images', 0);
        Storage::disk('testing_upload')->assertMissing('avatars/' . $avatar->hashName());
    }
}