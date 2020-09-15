<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReactionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_an_authenticated_user_can_react_to_a_review()
    {
        $this->signIn();
        $this->withoutExceptionHandling();
        // given we have a review
        $review = factory('App\Review')->create();

        // we can react to the review
        $this->followingRedirects()
            ->post(route('reviews.react', $review->id), ['type' => 'useful']);

        $this->assertDatabaseHas('review_reactions', ['type' => 'useful']);


        // we can react with multiple reactions
        $this->followingRedirects()
            ->post(route('reviews.react', $review->id), ['type' => 'funny']);

        $this->assertDatabaseCount('review_reactions', 2);
    }


    public function test_an_authenticated_user_can_remove_reaction_from_a_review()
    {
        $this->signIn();
        $this->withoutExceptionHandling();
        // given we have a review
        $review = factory('App\Review')->create();

        // we can react to the review
        $this->post(route('reviews.react', $review->id), ['type' => 'useful']);
        $this->post(route('reviews.react', $review->id), ['type' => 'funny']);

        $this->assertDatabaseCount('review_reactions', 2);

        $this->post(route('reviews.react', $review->id), ['type' => 'useful']);

        $this->assertDatabaseCount('review_reactions', 1);
    }

    public function test_an_authenticated_user_sees_reactions_to_a_review()
    {
        $this->signIn();

        $review = factory('App\Review')->create();

        // add useful  reaction
        $this->post(route('reviews.react', $review->id), ['type' => 'useful']);


        $this->assertFalse($review->isFunnyReactionBy());
        $this->assertTrue($review->isUsefulReactionBy());

        // remove useful  reaction, add funny reaction
        $this->post(route('reviews.react', $review->id), ['type' => 'useful']);
        $this->post(route('reviews.react', $review->id), ['type' => 'funny']);


        $this->assertFalse($review->isUsefulReactionBy());
        $this->assertTrue($review->isFunnyReactionBy());
    }
}