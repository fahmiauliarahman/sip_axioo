<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Department;
use App\School;
use App\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $judul = "Dashboard";
        $students = Student::all()->count();
        $messages = Contact::all()->count();
        $schools = School::all()->count();
        $departments = Department::all()->count();
        return view('home', compact('judul', 'students', 'messages', 'schools', 'departments'));
    }
}
