<?php

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
        factory(User::class, 10)->create()->each(function ($u) {
            $u->questions()->saveMany(factory(Question::class, random_int(3, 15))->make());
        });
    }
}
