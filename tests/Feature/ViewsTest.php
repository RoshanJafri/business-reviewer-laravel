<?php

namespace Tests\Feature;

use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewsTest extends TestCase
{
    use RefreshDatabase;


    public function test_a_business_has_views()
    {
        $this->signIn();
        $business = BusinessFactory::create();

        $this->get($business->path())->assertStatus(200);

        $this->assertEquals(1, $business->fresh()->viewCount());
    }
}