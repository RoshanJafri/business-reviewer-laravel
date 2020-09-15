<?php

namespace Tests\Unit;

use App\User;
use App\Review;
use Tests\TestCase;
use App\ReviewReaction;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_has_an_author()
    {
        $this->withoutExceptionHandling();

        $business = factory('App\Business')->create();
        $user = $this->signIn();
        $business->addReview('A new review', 4,  $user->id);

        $review = $business->reviews()->first();

        $this->assertInstanceOf(User::class, $review->author);
    }

    public function test_it_has_reactions()
    {
        $this->signIn();
        $this->withoutExceptionHandling();
        $review = factory('App\Review')->create();

        // funny, useful reactions <-
        $review->addReaction('funny');

        $this->assertInstanceOf(ReviewReaction::class, $review->reactions[0]);
        $this->assertDatabaseCount('review_reactions', 1);
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
}