<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestion;
use App\Http\Requests\EditQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionApiController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->get();

        return $questions;
    }

    public function show($question_id)
    {
        $question = Question::with('answers')->findOrFail($question_id);

        return $question;
    }


    public function store(CreateQuestion $request)
    {
        $question = new Question();
        $question->fill($request->all())->save();

        return $question;
    }


    public function update($id, EditQuestion $request)
    {
        $question = Question::findOrFail($id);
        $question->fill($request->all())->save();

        return $question;
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->answers()->delete();
        $question->delete();

        $questions = Question::orderBy('id', 'desc')->get();
        return $questions;
    }
}
