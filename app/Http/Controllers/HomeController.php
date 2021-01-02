<?php

namespace App\Http\Controllers;

use App\Contact;
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
        $students = Student::all();
        $messages = Contact::all();
        return view('home', compact('judul', 'students', 'messages'));
    }
}
