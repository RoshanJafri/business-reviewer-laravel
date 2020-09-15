<?php

namespace Tests\Setup;

class BusinessFactory
{

  protected $category;
  protected $reviewCount = 0;


  public function withCategory($name)
  {
    $this->category = factory('App\Category')->create(['name' => $name]);
    return $this;
  }

  public function withReviews($count)
  {
    $this->reviewCount = $count;
    return $this;
  }

  public function create($args = [])
  {
    $business =  factory('App\Business')->create($args);

    factory('App\Review', $this->reviewCount)->create(['business_id' => $business->id]);


    isset($this->category) ? $business->addCategory($this->category->id) : null;


    return $business;
  }
}