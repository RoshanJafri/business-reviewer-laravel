<?php

namespace Tests\Unit;

use App\Business;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_it_belongs_to_a_business()
    {
        $this->withoutExceptionHandling();

        $pivotTable = factory('App\BusinessCategory')->create();

        $business = Business::where('id', $pivotTable->business_id)->first();

        $this->assertInstanceOf(Category::class, $business->categories[0]);
    }

    public function test_it_can_show_businesses()
    {
        $this->withoutExceptionHandling();

        $pivotTable = factory('App\BusinessCategory')->create();

        $category = Category::where('id', $pivotTable->category_id)->first();


        $this->assertInstanceOf(Business::class, $category->businesses[0]);
    }
}