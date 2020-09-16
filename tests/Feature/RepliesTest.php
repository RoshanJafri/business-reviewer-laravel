<?php

namespace Tests\Feature;

use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RepliesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_business_owner_can_reply_to_review()
    {
        $owner = $this->signIn();
        $randomReviewer = factory('App\User')->create();
        $business = factory('App\Business')->create(['owner_id' => $owner->id]);

        $review =  $business->addReview('I hate this place so much!', $randomReviewer->id);

        $this->followingRedirects()->post(
            '/businesses/review/' . $review->id . '/reply',
            ['body' => 'Please explain your situation by emailing us!']
        );

        $this->assertDatabaseHas('replies', ['body' => 'Please explain your situation by emailing us!', 'owner_id' => $owner->id, 'review_id' => $review->id]);
    }

    public function test_a_non_owner_can_not_add_a_reply_to_a_review()
    {
        $this->signIn();
        $randomReviewer = factory('App\User')->create();
        $business = BusinessFactory::create();

        $review =  $business->addReview('I hate this place so much!', $randomReviewer->id);

        $this->followingRedirects()->post(
            '/businesses/review/' . $review->id . '/reply',
            ['body' => 'Please explain your situation by emailing us!']
        )->assertForbidden();

        $this->assertDatabaseMissing('replies', ['review_id' => $review->id]);
    }
}