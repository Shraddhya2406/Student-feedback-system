<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function FetchQuestions(Request $request)
    {   
        $status = 'N';
        $question = \DB::table('question')->get();
        $faculty = \DB::table('faculty')->get()
                                        ->where('status', $status);
        
        return view('Questions', ['question' => $question,'faculty' => $faculty]);
    }

    public function GiveFeedback(Request $request)
    {
        $qid = 1;
        for($qid = 1 ; $qid<=5 ; $qid++)
        {
            $range = 'range' . strval($qid);
            $comment = 'comment' . strval($qid);

            $feedback = new Feedback;
            $feedback->student_id = session('id');
            $feedback->faculty_id = $request->input('faculty');
            $feedback->question_id = $qid;
            $feedback->feedback_marks = $request->input($range);
            $feedback->comment = $request->input($comment);

            $feedback->save();
            
        }
        return redirect('dashboard');
    }

    public function FetchFeedback(Request $request)
    {   
        if (session('user_type') == 'A')
        {
            $faculty_id = $request->input('faculty');
        } else {
            $faculty_id = session('id');
        }
        $feedback = \DB::table('feedback')
                                ->join('question','question.id','=','feedback.question_id')
                                ->get()
                                ->where('faculty_id',$faculty_id);
    
        $avg_feedback = \DB::table('feedback')->where('faculty_id',$faculty_id)
                                              ->avg('feedback.feedback_marks');
        return view('Feedback', ['feedback' => $feedback,'avg_feedback' => $avg_feedback]);
    }

    public function FetchFaculty(Request $request)
    {
        $status = 'N';
        $faculty = \DB::table('faculty')->get()
                                        ->where('status', $status);
        return view('Feedback', ['faculty' => $faculty]);
    }

}