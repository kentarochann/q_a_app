<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\EditAnswer;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnswerController extends Controller
{
    public function create($question_id)
    {
        $question = Question::findOrFail($question_id);

        return view('answers/create', [
            'question' => $question,
        ]);
    }

    public function store(AnswerRequest $request)
    {
        $answer = new Answer();
        $answer->question_id = $request->question;
        $answer->content = $request->content;
        $answer->save();

        return redirect()->route('questions.show', ['question' => $answer->question_id]);
    }

    public function update($question_id, $answer_id, EditAnswer $request)
    {
        $answer = Answer::findOrFail($answer_id);

        $answer->content = $request->content;
        $answer->save();

        return redirect()->route('questions.show', ['question' => $question_id]);
    }

    public function destroy($question_id, $answer_id)
    {
        $answer = Answer::findOrFail($answer_id);
        $question = Question::findOrFail($question_id);

        $answer->delete();
        return redirect()->route('questions.show', ['question' => $question->id]);
    }
}
