<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        "content" => $faker->sentence(3),
        "category_id" => $faker->numberBetween(1, 10)
    ];
});
