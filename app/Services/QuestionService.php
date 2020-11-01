<?php


namespace App\Services;


use App\Models\Question;
use Illuminate\Http\Request;

class QuestionService
{
    public function getQuestions()
    {
        return Question::with('user')->latest()->paginate(10);
    }

    public function createQuestion(array $data)
    {
        return auth()->user()->questions()->create($data);
    }

    public function updateQuestion(array $data)
    {
        return Question::query()->update($data);
    }
}
