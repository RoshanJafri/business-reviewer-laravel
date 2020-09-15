<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Facades\Tests\Setup\BusinessFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BusinessImagesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_users_can_upload_a_single_image_of_business()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $business = BusinessFactory::create();

        $image = $this->mockImageUpload();
        $this->post($business->path() . '/images', ['image' => $image]);

        $this->assertDatabaseCount('images', 1);
        Storage::disk('testing_upload')->assertExists('guest_uploads/' . $image->hashName());
    }
}