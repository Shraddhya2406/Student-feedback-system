<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Feedback;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function  gotoDashboard(Request $request) 
    { 
        return view('dashboard');

    }


}