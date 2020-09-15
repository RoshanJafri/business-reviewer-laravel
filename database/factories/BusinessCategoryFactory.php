<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use App\BusinessCategory;
use App\Category;

use Faker\Generator as Faker;

$factory->define(BusinessCategory::class, function (Faker $faker) {
    return [
        'business_id' => factory(Business::class),
        'category_id' => factory(Category::class)
    ];
});