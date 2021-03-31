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
        $faculty = \DB::table('faculty')->where('status', $status)
                                        ->get();
        if(session('user_type')=='A')
        {
            return view('edit_question', ['question' => $question]);
        }
        return view('Questions', ['question' => $question,'faculty' => $faculty]);
    }

    public function GiveFeedback(Request $request)
    {
        $qid = 1;
        for($qid = 1 ; $qid<=6 ; $qid++)
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
        return view('Feedback', ['feedback' => $feedback,'avg_feedback' => round($avg_feedback,2)]);
    }

    public function FetchFaculty(Request $request)
    {
        $status = 'N';
        $faculty = \DB::table('faculty')->where('status', $status)
                                            ->get();
        return view('Feedback', ['faculty' => $faculty]);
    }

    public function AddQuestions(Request $request)
    {
       $question = new Question ;
       $question->ques_description = $request->input('question');
       
        if($question->save())
        {
            return redirect('add_question')->with('status','Question Added Sucessfully');
        }
        else
        {
            return redirect('add_question')->with('status','Something went wrong, Please Try Again!');
        }

    }

    public function EditQuestions(Request $request)
    {
        $id = $request->input('id');
        $ques_description = $request->input('question'); 
        \DB::update('update question set ques_description = ? where id = ?',[$ques_description,$id]);
        return redirect('edit_question')->with('status','Question Updated Sucessfully');
    }

}