<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\View;
use App\Business;
use Faker\Generator as Faker;

$factory->define(View::class, function (Faker $faker) {
    return [
        'viewable_id' => factory(Business::class),
        'viewable_type' => 'App\Business',
        'viewer_id' => factory(User::class)
    ];
});