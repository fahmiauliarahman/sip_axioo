<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Department";
        return view('masterdata.department.index', compact('judul'));
    }

    public function data()
    {
        $data = Department::all();
        return response()->json($data, 200);
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
        $department_name = $request->department_name;
        $department = Department::where('dpt_name', $department_name)->first();
        if (!$department) {
            Department::firstOrCreate(
                [
                    'dpt_name' => $department_name,
                ],
                [
                    'dpt_name' => $department_name,
                ]
            );
            $data['success'] = true;
            $data['messages'] = "Department successfully added!";
        } else {
            $data['success'] = false;
            $data['messages'] = "This Department is Already Registered!";
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Department::find($id);
        return response()->json($data, 200);
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
        $department_name = $request->department_name;
        $department = Department::find($id);
        $department->dpt_name = $department_name;
        $department->update();
        $data['success'] = true;
        $data['messages'] = "Department Successfully Updated!";
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
        Department::destroy($id);
        $data['success'] = true;
        $data['messages'] = "Data Deleted Successfully.";
        return response()->json($data, 200);
    }
}
