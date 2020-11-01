<?php

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 3)->create()->each(function($u) {
            $u->questions()
                ->saveMany(
                    factory(App\Models\Question::class, random_int(1, 5))->make()
                )
                ->each(function ($q) {
                    $q->answers()->saveMany(factory(App\Models\Answer::class, random_int(1, 5))->make());
                });
        });
    }
}
