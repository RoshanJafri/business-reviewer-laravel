<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */


    public function test_it_calculates_average_review()
    {
        $user = $this->signIn(null, ['review_count' => 0]);

        $businessOne = BusinessFactory::create();
        $businessTwo = BusinessFactory::create();

        $businessOne->addReview('a review', 2);
        $businessTwo->addReview('another review', 5);

        $this->assertEquals((5 + 2) / 2, $user->reviewAverage());
    }

    public function test_it_can_add_avatar()
    {
        $user = $this->signIn();
        $image = $this->mockImageUpload();

        $user->addAvatar($image);
        $this->assertDatabaseHas('images', ['image_path' => 'avatars/' . $image->hashName()]);
        Storage::disk('testing_upload')->assertExists('avatars/' . $image->hashName());
    }

    public function test_it_can_remove_avatar()
    {
        $user = $this->signIn();
        $image = $this->mockImageUpload();

        $user->addAvatar($image);
        $this->assertDatabaseHas('images', ['image_path' => 'avatars/' . $image->hashName()]);
        Storage::disk('testing_upload')->assertExists('avatars/' . $image->hashName());

        $user->removeAvatar();
        $this->assertDatabaseMissing('images', ['image_path' => 'avatars/' . $image->hashName()]);
        Storage::disk('testing_upload')->assertMissing('avatars/' . $image->hashName());
    }

    public function test_it_displays_the_correct_avatar()
    {
        // avatar is not set
        $user = $this->signIn();
        $this->assertEquals('https://ui-avatars.com/api/?name=' . $user->name . '&color=7F9CF5&background=EBF4FF', $user->displayAvatar());

        //avatar is set
        $image = $this->mockImageUpload();
        $user->addAvatar($image);

        $this->assertEquals('avatars/' . $image->hashName(), $user->fresh()->displayAvatar());
    }
}