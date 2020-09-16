<?php

namespace Tests\Unit;

use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_it_has_a_path()
    {
        $business = BusinessFactory::create();
        $image = $this->mockImageUpload();

        $business->addImage($image);

        $this->assertEquals('/storage/guest_uploads/' . $image->hashName(), $business->images[0]->path());
    }
}