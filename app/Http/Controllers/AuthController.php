<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class AuthController extends Controller
{
public function registration(Request $request)
    {   
        if ($request->input('user_type') == 'S'){
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
        
            if($student->save()){
                
                return redirect('signin')->with('status',"Registered successfully");
            
            }else{
                
                return redirect('signin')->with('failed',"Something wrong! Try again later");
            }
        } else {
            return redirect('signin')->with('failed',"Something wrong! Try again later");
        }
    }

    public function signin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($request->input('user_type') == 'S'){
            $student = \DB::table('student')->where('email', $email)->first();
            //$student = Student::find($email); 

            /*error_log($student->password);

            error_log($request->input('email'));

            error_log($request->input('password'));*/

            if ($student->password = $password)
            {           
                session(['name' => $student->name]);
                session(['email' => $student->email]);
                session(['id' => $student->student_id]);
                
                return redirect('dashboard')->with('status','Welcome to Student Feedback System');
            }
            else
            {
                return redirect('signin')->with('msg','username or password are incorrect');
            }

        } else {
            return redirect('signin')->with('msg','username or password are incorrect');
        }
    }

}