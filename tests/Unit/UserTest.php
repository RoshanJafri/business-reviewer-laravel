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


    public function test_it_calculates_average_review()
    {
        $user = $this->signIn(null, ['review_count' => 0]);

        $businessOne = BusinessFactory::create();
        $businessTwo = BusinessFactory::create();

        $businessOne->addReview('a review', 2);
        $businessTwo->addReview('another review', 5);

        $this->assertEquals((5 + 2) / 2, $user->reviewAverage());
    }
}
