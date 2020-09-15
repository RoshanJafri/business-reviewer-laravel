<?php

namespace Tests\Unit;

use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_it_can_see_reviews_count()
    {
        $user = $this->signIn();

        $businessOne = BusinessFactory::create();

        $businessOne->addReview('a review', 3);
        $this->assertEquals($user->reviewsCount(), 1);

        $businessTwo = BusinessFactory::create();

        $businessTwo->addReview('another review', 5);

        $this->assertEquals($user->reviewsCount(), 2);
    }

    public function test_it_calculates_average_review()
    {
        $user = $this->signIn();

        $businessOne = BusinessFactory::create();
        $businessTwo = BusinessFactory::create();

        $businessOne->addReview('a review', 2);
        $businessTwo->addReview('another review', 5);

        $this->assertEquals($user->reviewAverage(), (5 + 2) / 2);
    }
}