<?php

namespace Tests\Feature;

use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_users_average_score_updates_when_adding_a_review()
    {
        $businessOne = BusinessFactory::create();
        $businessTwo = BusinessFactory::create();
        $businessThree = BusinessFactory::create();

        $user = $this->signIn();

        $businessOne->addReview('my first review', 1);
        $this->assertEquals(1, $user->fresh()->average_rating);


        $businessTwo->addReview('my first review', 5);
        $this->assertEquals((1 + 5) / 2, $user->fresh()->average_rating);


        $businessThree->addReview('my first review', 2);
        $this->assertEquals(round((1 + 5 + 2) / 3, 1), $user->fresh()->average_rating);
    }
}