<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;
use App\Services\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

        $this->questionService = $questionService;
    }

    public function index()
    {
        $questions = $this->questionService->getQuestions();

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $question = new Question();

        return view('questions.create', compact('question'));
    }

    public function show(Question $question)
    {
        $question->increment('views');

        return view('questions.show', compact('question'));
    }

    public function store(AskQuestionRequest $request)
    {
        $this->questionService->createQuestion($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', '投稿しました');
    }

    public function edit(Question $question)
    {
        $this->authorize("update", $question);
        return view('questions.edit', compact('question'));
    }

    public function update(AskQuestionRequest $request, Question $question)
    {
        $this->authorize("update", $question);

        $this->questionService->updateQuestion($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', '編集しました');
    }

    public function destroy(Question $question)
    {
        $this->authorize("delete", $question);

        $question->delete();

        return redirect()->route('questions.index')->with('success', '質問を削除しました');
    }
}
