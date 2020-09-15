<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Review;
use App\Business;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    Review::flushEventListeners(); // prevents event observer to run
    return [
        'body' => $faker->paragraph(),
        'user_id' => factory(User::class),
        'business_id' => factory(Business::class),
        'rating' => $faker->numberBetween(1, 5),
        'top_rated' => false
    ];
});