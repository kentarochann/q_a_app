<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestion;
use App\Http\Requests\EditQuestion;
use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->get();

        return view('questions.index', [
            'questions' => $questions,
        ]);
    }

    //$question_idを受け取ってる
    public function show($question_id)
    {
        // findOrFailは$question_idがなければ４０４を返す
        $question = Question::findOrFail($question_id);

        // Questionモデルのリレーションメソッドが定義してあるので、answersプロパティにアクセスする
        $answers = Question::find($question_id)->answers;

        return view('questions.show', [
            'question' => $question,
            'answers' => $answers,
        ]);
    }

    public function create()
    {
        return view('questions/create');
    }

    public function store(CreateQuestion $request)
    {
        $question = new Question();
        $question->title = $request->title;
        $question->content = $request->content;
        $question->status = 1;
        $question->save();

        return redirect()->route('questions.index');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.edit', [
            'question' => $question
        ]);
    }

    public function update($id, EditQuestion $request)
    {
        $question = Question::findOrFail($id);

        $question->title = $request->title;
        $question->content = $request->content;
        $question->save();

        return redirect()->route('questions.show', ['question' => $question->id]);

    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->answers()->delete();
        $question->delete();
        return redirect()->route('questions.index');
    }
}
