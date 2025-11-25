<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        // Get counts
        $students_count = Student::count();
        $teachers_count = Teacher::count();

        // Pass counts to the view
        return view('home', compact('students_count', 'teachers_count'));
    }
}
