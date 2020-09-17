<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewTest extends TestCase
{

    use RefreshDatabase;

    public function test_it_has_a_viewer()
    {
        $view = factory('App\View')->create();

        $this->assertInstanceOf(User::class, $view->viewer);
    }
}