<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function question() {
        $path_json = Storage::disk('local')->get('question.json');
        $question_all = json_decode($path_json, true);

        return view("question")
        ->with("question_all", $question_all)
        ->with("question", 1)
        ->with("score", 0);
    }

    public function score(Request $request) {
        $question = $request->question;
        $score_all = $request->score_all;
        $score = $request->input('radio_'.$question);

        $path_json = Storage::disk('local')->get('question.json');
        $question_all = json_decode($path_json, true);

        return view("question")
        ->with("question_all", $question_all)
        ->with("question", $question+1)
        ->with("score", $score_all+$score);
    }
}
