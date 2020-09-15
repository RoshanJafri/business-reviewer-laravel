<?php

namespace Tests;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        $user = $user ?: factory('App\User')->create();
        $this->actingAs($user);

        return $user;
    }

    protected function mockImageUpload()
    {
        Storage::fake('testing_upload');

        return UploadedFile::fake()->image('image.jpg', 5, 5);
    }
}