<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function question()
    {
        $path_json = Storage::disk('local')->get('question.json');
        $question_all = json_decode($path_json, true);

        return view("question")
            ->with("question_all", $question_all)
            ->with("page", 1)
            ->with("score", 0);
    }

    public function page(Request $request, $page)
    {
        $question = $request->question;
        $score_all = $request->score_all;
        $score = $request->input('radio_' . $question);

        $score_arr = array();
        if ($request->session()->has('score_all')) {
            if ($question != null) {
                $score_arr = $request->session()->get('score_all');
                array_push($score_arr, array('question' => $question, 'score' => $score));
                $request->session()->put('score_all', $score_arr);
            }
        } else {
            if ($question != null) {
                array_push($score_arr, array('question' => $question, 'score' => $score));
                $request->session()->put('score_all', $score_arr);
            }
        }

        $path_json = Storage::disk('local')->get('question.json');
        $question_all = json_decode($path_json, true);

        return view("question")
            ->with("question_all", $question_all)
            ->with("page", $page)
            ->with("score", $score_all + $score);
    }

    public function delete_session(Request $request)
    {
        $request->session()->forget('score_all');
        echo "deleted!";
    }

    public function get_session(Request $request)
    {
        return $request->session()->get('score_all');
    }
}
