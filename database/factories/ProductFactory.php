<?php

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
     'name'=>substr($faker->sentence(3),0,-1),
     'description'=>$faker->sentence(50),
     'long_description'=>$faker->text,
     'price'=>$faker->randomFloat(2,5,300),
     'category_id'=>$faker->numberBetween(1,5)
  ];   
    
});
