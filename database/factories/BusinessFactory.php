<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Business;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {

    $name = $faker->sentence;
    return [
        'name' => $name,
        'average_review' => random_int(0, 5),
        'owner_id' => factory(User::class),
        'slug' => Str::slug($name),
        'front_image' => 'businesses/default-image.jpg',
        'description' => $faker->text,
        'address' => $faker->address,
        'country' => $faker->country,
        'city' => $faker->city,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->email,
        'geo_location' => json_encode([$faker->latitude, $faker->longitude]),
        'website_url' => 'https://www' . Str::slug($name, '') . '.com'
    ];
});