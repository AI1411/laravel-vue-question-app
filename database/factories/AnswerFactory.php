<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraphs(random_int(3, 7), true),
        'user_id' => User::query()->pluck('id')->random(),
        'votes_count' => random_int(0, 5),
    ];
});
