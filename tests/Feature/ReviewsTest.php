<?php

namespace Tests\Feature;

use App\Review;
use App\Business;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_an_authenticated_user_can_add_a_review()
    {
        $user = $this->signIn();
        $this->withoutExceptionHandling();

        $business = BusinessFactory::create();

        $this->followingRedirects()
            ->post(route('reviews.store', $business->slug), ['body' => 'A review', 'rating' => 4])
            ->assertSee('A review')
            ->assertSee($user->name);


        $this->assertDatabaseHas('reviews', ['body' => 'A review', 'rating' => 4]);
    }


    public function test_only_one_review_can_be_created_by_a_user_per_business()
    {
        $this->signIn();

        $business = factory('App\Business')->create(['average_review' => 0]);

        $this->post(route('reviews.store', $business->slug), ['body' => 'A review', 'rating' => 4]);

        $this->post(route('reviews.store', $business->slug), ['body' => 'A second review', 'rating' => 2])
            ->assertForbidden();


        $this->get($business->path())->assertDontSee('Submit Review');

        $this->assertDatabaseCount('reviews', 1);
    }

    public function test_an_owner_can_not_review_their_own_business()
    {
        $owner = $this->signIn();

        $business = BusinessFactory::create(['owner_id' => $owner->id]);

        $this->post(route('reviews.store', $business->slug), ['body' => 'A review', 'rating' => 2])->assertForbidden();

        $this->assertDatabaseCount('reviews', 0);
    }

    public function test_a_review_displays_reactions_count()
    {
        $this->signIn();
        // if we have a review
        $review = factory('App\Review')->create();
        // and a user reacts to a review
        $this->post(route('reviews.react', $review->id), ['type' => 'funny']);
        $this->post(route('reviews.react', $review->id), ['type' => 'useful']);

        $this->signIn();
        $this->post(route('reviews.react', $review->id), ['type' => 'useful']);
        // it displays the review count
        $this->assertEquals($review->funnyCount(), 1);
        $this->assertEquals($review->usefulCount(), 2);
    }

    public function test_a_user_can_add_an_image_to_review()
    {

        $this->signIn();

        $business = factory('App\Business')->create();
        $user = $this->signIn();

        $image = $this->mockImageUpload();

        $this->followingRedirects()
            ->post(route('reviews.store', $business->slug), ['body' => 'A review', 'rating' => 4, 'image' => $image])
            ->assertSee('A review')
            ->assertSee($user->name);

        Storage::disk('testing_upload')->assertExists('reviews/' . $image->hashName());
    }
}