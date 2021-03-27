<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AccountController extends Controller
{
public function SaveAccount(Request $request)
    {   
        $email = session('email');
        $user_type = session('user_type');
        if ($user_type == 'S'){
            $dob = $request->input('dob');
            $gender = $request->input('gender');
            $depertment = $request->input('depertment');
            $phone = $request->input('phone');
            $address = $request->input('address');
            \DB::update('update student set dob = ? , gender = ? , depertment = ? , phone = ? , address = ? where email = ?',[$dob,$gender,$depertment,$phone,$address,$email]);
            return redirect('dashboard')->with('status_update',"Profile Details Updated successfully");
          
        } 
        elseif ($user_type == 'F'){
            $dob = $request->input('dob');
            $gender = $request->input('gender');
            $depertment = $request->input('depertment');
            $phone = $request->input('phone');
            $address = $request->input('address');
            \DB::update('update faculty set dob = ? , gender = ? , depertment = ? , phone = ? , address = ? where email = ?',[$dob,$gender,$depertment,$phone,$address,$email]);
            return redirect('dashboard')->with('status_update',"Profile Details Updated successfully");
        }
        elseif ($user_type == 'A'){
            $phone = $request->input('phone');
            $address = $request->input('address');
            \DB::update('update admin set  phone = ? , address = ? where admin_email = ?',[$phone,$address,$email]);
            return redirect('dashboard')->with('status_update',"Profile Details Updated successfully");
        }
        else {
            return redirect('dashboard')->with('status_update',"Something wrong! Try again later");
        }
    }

    public function FetchAccount(Request $request)
    {
        $email = session('email');
        $user_type = session('user_type');

        if ($user_type == 'S'){
            $student = \DB::table('student')->where('email', $email)
                                            ->first();
            if ($student)
            {           
                return view('account',['user' => $student]);
            }

        }
        elseif ($user_type == 'F'){
            $faculty = \DB::table('faculty')->where('admin_email', $email)
                                            ->first();
            if ($faculty)
            {           
                return view('account',['user' => $faculty]);
            }

        }
        elseif ($user_type == 'A'){
            $admin = \DB::table('admin')->where('admin_email', $email)
                                            ->first();
            if ($admin)
            {           
                return view('admin_account',['user' => $admin]);
            }

        }
        
        $request->session()->flush();
        return redirect('signin')->with('msg','Something went wrong. Please Login again'); 
    }

    public function EditUserByAdmin(Request $request)
    {   
        $email =  session('edit_email');
        $user_type = session('edit_user_type');
        if ($user_type == 'S'){
            $dob = $request->input('dob');
            $gender = $request->input('gender');
            $depertment = $request->input('depertment');
            $phone = $request->input('phone');
            $address = $request->input('address');
            \DB::update('update student set dob = ? , gender = ? , depertment = ? , phone = ? , address = ? where email = ?',[$dob,$gender,$depertment,$phone,$address,$email]);
            return redirect('dashboard')->with('status_update',"Profile Details Updated successfully");
          
        } 
        elseif ($user_type == 'F'){
            $dob = $request->input('dob');
            $gender = $request->input('gender');
            $depertment = $request->input('depertment');
            $phone = $request->input('phone');
            $address = $request->input('address');
            \DB::update('update faculty set dob = ? , gender = ? , depertment = ? , phone = ? , address = ? where email = ?',[$dob,$gender,$depertment,$phone,$address,$email]);
            return redirect('dashboard')->with('status_update',"Profile Details Updated successfully");
        }
        else {
            return redirect('dashboard')->with('status_update',"Something wrong! Try again later");
        }
    }

    public function FetchUserByAdmin(Request $request)
    {
        $email = $request->input('search');
        $user_type = $request->input('user_type');

        session(['edit_email' => $email]);
        session(['edit_user_type' => $user_type]);

        if ($user_type == 'S'){
            $student = \DB::table('student')->where('email', $email)
                                            ->first();
            if ($student)
            {          
                return view('account',['user' => $student]);
            }

        }
        elseif ($user_type == 'F'){
            $faculty = \DB::table('faculty')->where('admin_email', $email)
                                            ->first();
            if ($faculty)
            {           
                return view('account',['user' => $faculty]);
            }

        }
        return redirect('dashboard')->with('status_update',"Something wrong! Try again later");
    }

}