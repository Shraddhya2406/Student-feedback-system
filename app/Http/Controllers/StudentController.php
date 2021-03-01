<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
public function student_registration(Request $request)
    {
        $student = new Student;
        $student->student_id = '100';
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->gender = $request->input('gender');
        $student->dob = $request->input('dob');
        $student->depertment = $request->input('depertment');
        $student->status = 'N';
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->save();
        return redirect('/');
       
    /*if($student->save()){
        
        return redirect('log-in')->with('status',"Insert successfully");
    
    }else{
          
            return redirect('log-in')->with('failed',"Try again later");
    }*/
    }

    public function signin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $student = \DB::table('student')->where('email', $email)->first();
        //$student = Student::find($email); 

        /*error_log($student->password);

       error_log($request->input('email'));

       error_log($request->input('password'));*/

       if ($student->password = $password)
       {
            // return redirect('dashboard')->with('user',$student->name);
            return view('dashboard', ['user' => $student]);
       }
       else
       {
           return redirect('signin')->with('msg','username or password are incurrect');
       }

       //return redirect('/');
    }

}