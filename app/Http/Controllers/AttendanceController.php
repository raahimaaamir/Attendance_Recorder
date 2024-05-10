<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjust the namespace here
use App\Models\Attendance; // Adjust the namespace here
use App\Models\ClassModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AttendanceController extends Controller 
{
    public function displayattendance(Request $request)
{
    $user = Auth::user();

    if ($user->role == 'teacher') {
        // Retrieve the class information for the teacher
        $class = ClassModel::where('teacherid', $user->id)->first();

        // If class information exists, fetch the students for that class
        if ($class) {
            $students = User::where('role', 'student')->get();
            return view('attendance', ['students' => $students, 'class' => $class]);
        } else {
            // Handle case where teacher does not have a class assigned
            return redirect()->back()->withErrors(['message' => 'No class assigned to the teacher']);
        }
    } else {
        return redirect()->back()->withErrors(['message' => 'Unauthorized access']);
    }
}

    public function attendancesubmit(Request $request)
{
    // Validate the request data
    $request->validate([
        'student_ids' => 'required|array',
        'student_ids.*' => 'exists:users,id',
        'is_present.*' => 'required|boolean', // Assuming 'is_present' is the name of the checkbox input
    ]);

    // Retrieve the authenticated user (assuming it's a teacher)
    $teacher = auth()->user();

    // Retrieve the class ID for the teacher
    $classId = ClassModel::getClassIdByTeacherId($teacher->id);

    // Process attendance for each student
    foreach ($request->input('student_ids') as $key => $studentId) {
        // Get the isPresent value for the current student
        $isPresent = $request->input('is_present.' . $key, false);

        // Create attendance record
        Attendance::create([
            'studentid' => $studentId,
            'isPresent' => $isPresent,
            'classid' => $classId, // Use the class ID corresponding to the teacher
            'comments' => '', // Or fetch comments from the form if available
        ]);
    }

    // Redirect back to the attendance page with success message
    return redirect()->route('attendance.displayattendance', ['id' => auth()->id()])->with('success', 'Attendance submitted successfully');
}

};