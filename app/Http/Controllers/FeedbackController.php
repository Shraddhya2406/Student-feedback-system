<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function FetchQuestions(Request $request)
    {
        $question = \DB::table('question')->get();

        return view('Questions', ['question' => $question]);
    }

}