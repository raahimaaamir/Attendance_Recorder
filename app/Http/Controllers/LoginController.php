<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjust the namespace here
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            // Check user's role and redirect accordingly
            switch ($user->role) {
                case 'student':
                    return redirect()->route('student.show', ['id' => $user->id]);
                    break;
                case 'teacher':
                    return redirect()->route('attendance.displayattendance', ['id' => $user->id]);
                    break;
                default:
                    // Handle other roles or unauthorized access
                    return redirect()->back()->withErrors(['message' => 'Unauthorized access']);
                    break;
                    }
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['message' => 'Invalid email or password']);
        }
    }

    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'class' => 'required|string|max:10',
            'role' => 'required|string|in:teacher,student,admin',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user instance and save it to the database
        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'class' => $request->class,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Redirect the user after successful sign-up
        return redirect('/login')->with('success', 'Sign up successful! Please log in.');
    }
};