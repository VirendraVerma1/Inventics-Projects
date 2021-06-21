<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->paragraph.''.$faker->paragraph.''.$faker->paragraph,
        'category_id'=> App\Category::all()->random()->id,
        
    ];
});
