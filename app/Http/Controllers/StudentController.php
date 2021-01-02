<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Students";
        return view('student.index', compact('judul'));
    }

    public function data()
    {
        $data = DB::table('students')->leftJoin('departments', 'students.department_id', '=', 'departments.id')->leftJoin('schools', 'students.school_id', '=', 'schools.id')->select('students.*', 'departments.dpt_name', 'schools.school_name')->get();
        return response()->json($data, 200);
    }

    public function test()
    {
        return redirect(route('student.index'))->with('success', 'hai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create([
            'full_name' => $request->name,
            'school_id' => $request->school_id,
            'grade' => $request->grade,
            'phone_num' => $request->phone_number,
            'email' => $request->email,
            'department_id' => $request->dept_id,
        ]);

        if ($student) {
            $data['success'] = true;
            $data['messages'] = "Student Saved.";
        } else {
            $data['success'] = false;
            $data['messages'] = "Something went wrong - Ajax Failed.";
        }
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('students')->leftJoin('departments', 'students.department_id', '=', 'departments.id')->leftJoin('schools', 'students.school_id', '=', 'schools.id')->select('students.*', 'departments.dpt_name', 'schools.school_name')->where('students.id', $id)->first();
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::where('id', $id)
        ->update([
            'full_name' => $request->name,
            'school_id' => $request->school_id,
            'grade' => $request->grade,
            'phone_num' => $request->phone_number,
            'email' => $request->email,
            'department_id' => $request->dept_id,
        ]);

        if ($student) {
            $data['success'] = true;
            $data['messages'] = "Student Successfully Updated!";
        } else {
            $data['success'] = false;
            $data['messages'] = "Something went wrong - Ajax Update Failed.";
        }
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        $data['success'] = true;
        $data['messages'] = "Data Deleted Successfully.";
        return response()->json($data, 200);
    }
}
