<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;    
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;

class StudentController extends Controller {

public function show($id)
    {
        // Retrieve the student
        $student = User::findOrFail($id);

        // Retrieve the student's attendance records
        $attendance = Attendance::where('studentid', $id)->get();

        // Pass the student and attendance data to the Blade template
        return view('student', compact('student', 'attendance'));
    }
    
};