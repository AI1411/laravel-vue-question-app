<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(random_int(5, 10)), "."),
        'body' => $faker->paragraphs(random_int(3, 7), true),
        'views' => random_int(0, 10),
//        'answers_count' => random_int(0, 10),
        'votes' => random_int(-3, 10),
        'created_at' => $faker->dateTimeBetween('-1 year', 'now')
    ];
});
