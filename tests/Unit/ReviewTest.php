<?php

namespace Tests\Unit;

use App\User;
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

        $business = factory('App\Business')->create();
        $user = $this->signIn();
        $business->addReview('A new review', 4, null, $user->id);

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
}