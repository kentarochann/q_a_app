<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\EditAnswer;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerApiController extends Controller
{
    public function store(AnswerRequest $request)
    {
        $answer = new Answer();
        $answer->question_id = $request->question;
        $answer->content = $request->content;
        $answer->save();

        return $answer;
    }

    public function update($question_id, $answer_id, EditAnswer $request)
    {
        $answer = Answer::findOrFail($answer_id);

        $answer->content = $request->content;
        $answer->save();

        return $answer;
    }

    public function destroy($question_id, $answer_id)
    {
        $answer = Answer::findOrFail($answer_id);
        $question = Question::with('answers')->findOrFail($question_id);

        $answer->delete();
        return $question;
    }
}
