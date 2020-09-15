<?php

namespace Tests\Unit;

use App\Reply;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTests extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_can_add_replies_to_reviews()
    {
        $owner = $this->signIn();
        $randomUser = factory('App\User')->create();

        $business = factory('App\Business')->create(['owner_id' => $owner->id]);
        $review = $business->addReview('Awesome', $randomUser->id);

        $review->addReply('Thank you!');

        $this->assertInstanceOf(Reply::class, $review->reply);
    }
}