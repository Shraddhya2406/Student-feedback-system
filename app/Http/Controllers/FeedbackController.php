<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function FetchQuestions(Request $request)
    {
        $question = \DB::table('question')->get();

        return view('Questions', ['question' => $question]);
    }

    public function GiveFeedback(Request $request)
    {
        $qid = 1;
        for($qid = 1 ; $qid<=5 ; $qid++)
        {
            $range = 'range' . strval($qid);
            $comment = 'comment' . strval($qid);
            
            error_log($request->input('faculty'));
            error_log($user->student_id);

            $feedback = new Feedback;
            $feedback->student_id = '100'; //$user->student_id
            $feedback->faculty_id = $request->input('faculty');
            $feedback->question_id = $qid;
            $feedback->feedback_marks = $request->input($range);
            $feedback->comment = $request->input($comment);

            $feedback->save();
            
        }
        return redirect('dashboard');
    }

}