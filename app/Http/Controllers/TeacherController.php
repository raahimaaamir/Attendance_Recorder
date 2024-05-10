<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Http\Request;
class TeacherController extends Controller {

    public function show(){
        $user = Auth::user();
        if($user->role == 'teacher'){
            return view('teacher', ['user' => $user]);
        } else {
            return redirect()->back()->withErrors(['message' => 'Unauthorized access']);
        }
    }
};