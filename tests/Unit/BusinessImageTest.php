<?php

namespace Tests\Unit;

use App\Image;
use Tests\TestCase;
use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BusinessImageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_it_has_images()
    {
        $business = BusinessFactory::create();
        $this->assertContainsOnlyInstancesOf(Image::class, $business->images);
    }

    public function test_it_can_store_images()
    {
        $business = BusinessFactory::create();
        $image = $this->mockImageUpload();

        $business->addImage($image);

        $this->assertDatabaseHas('images', ['image_path' => 'guest_uploads/' . $image->hashName()]);
    }
}