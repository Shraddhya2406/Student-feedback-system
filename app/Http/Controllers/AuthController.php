<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Admin;
use Illuminate\Http\Request;

class AuthController extends Controller
{
public function registration(Request $request)
    {   
        if ($request->input('user_type') == 'S'){

            // Dynamically calculating student_id
            $student_id = \DB::table('student')->max('student_id');
            
            $student = new Student;
            $student->student_id = intval($student_id) + 1;
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
                if (session('user_type') == 'A'){
                    return redirect('dashboard')->with('status_update',"Registered successfully");
                } else {
                    return redirect('signin')->with('status',"Registered successfully");
                }
            
            }else{
                
                return redirect('signin')->with('failed',"Something wrong! Try again later");
            }
        }
        elseif($request->input('user_type') == 'F'){
        
                $faculty_id = \DB::table('faculty')->max('faculty_id');
                
                $faculty = new Faculty;
                $faculty->faculty_id = intval($faculty_id) + 1;
                $faculty->name = $request->input('name');
                $faculty->email = $request->input('email');
                $faculty->password = $request->input('password');
                $faculty->gender = $request->input('gender');
                $faculty->dob = $request->input('dob');
                $faculty->depertment = $request->input('depertment');
                $faculty->status = 'N';
                $faculty->phone = $request->input('phone');
                $faculty->address = $request->input('address');
    
            
                if($faculty->save()){
                    if (session('user_type') == 'A'){
                        return redirect('dashboard')->with('status_update',"Registered successfully");
                    } else {
                        return redirect('signin')->with('status',"Registered successfully");
                    }
                
                }else{
                    
                    return redirect('signin')->with('failed',"Something wrong! Try again later");
                }
        }
        else {
            return redirect('signin')->with('failed',"Something wrong! Try again later");
        }
    }

    public function signin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $status = 'N';

        if ($request->input('user_type') == 'S'){
            $student = \DB::table('student')->where('email', $email)
                                            ->where('password', $password)
                                            ->where('status', $status)
                                            ->first();

            if ($student)
            {           
                session(['name' => $student->name]);
                session(['email' => $student->email]);
                session(['id' => $student->student_id]);
                session(['user_type' => 'S']);
                
                return redirect('dashboard')->with('status','Welcome to Student Feedback System');
            }
            else
            {
                return redirect('signin')->with('msg','username or password is incorrect');
            }

        } 
        elseif($request->input('user_type') == 'F'){
            $faculty = \DB::table('faculty')->where('email', $email)
                                            ->where('password', $password)
                                            ->where('status', $status)
                                            ->first();

            if ($faculty)
            {           
                session(['name' => $faculty->name]);
                session(['email' => $faculty->email]);
                session(['id' => $faculty->faculty_id]);
                session(['user_type' => 'F']);
                
                return redirect('dashboard')->with('status','Welcome to Student Feedback System');
            }
            else
            {
                return redirect('signin')->with('msg','username or password is incorrect');
            }

        }
        elseif($request->input('user_type') == 'A'){
            $admin = \DB::table('admin')->where('admin_email', $email)
                                            ->where('password', $password)
                                            ->first();

            if ($admin)
            {           
                session(['name' => $admin->admin_name]);
                session(['email' => $admin->admin_email]);
                session(['id' => $admin->id]);
                session(['user_type' => 'A']);
                
                return redirect('dashboard')->with('status','Welcome to Student Feedback System');
            }
            else
            {
                return redirect('signin')->with('msg','username or password is incorrect');
            }
        }
        else {
            return redirect('signin')->with('msg','username or password are incorrect');
        }
    }

    public function signout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

}