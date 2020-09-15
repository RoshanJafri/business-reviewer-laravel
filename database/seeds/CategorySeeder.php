<?php

use App\User;
use App\Review;
use App\Business;
use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultCategories = ['Hotel', 'Restaurant', 'Spa', 'Bar'];

        foreach ($defaultCategories as $category) {
            factory(Category::class)->create(['name' => $category])->each(function ($category) {
                $category->businesses()->attach(factory(Business::class, 5)->create()->each(
                    function ($business) {
                        for ($i = 0; $i < 5; $i++) {
                            Review::flushEventListeners(); // prevents event observer to run
                            factory(Review::class, 1)->create(['business_id' => $business->id, 'user_id' => factory(User::class)->create()]);
                        }
                    }
                ));
            });
        }
    }
}