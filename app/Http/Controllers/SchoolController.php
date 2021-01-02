<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "School";
        return view('masterdata.school.index', compact('judul'));
    }

    public function data()
    {
        $data = School::all();
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
        $school_name = $request->school_name;
        $school_address = $request->school_address;
        $school = School::where('school_name', $school_name)->first();

        if (!$school) {
            School::firstOrCreate(
                [
                    'school_name' => $school_name,
                ],
                [
                    'school_name' => $school_name,
                    'school_address' => $school_address,
                ]
            );
            $data['success'] = true;
            $data['messages'] = "School successfully added!";
        } else {
            $data['success'] = false;
            $data['messages'] = "This School is Already Registered!";
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
        $data = School::find($id);
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
        $school_name = $request->school_name;
        $school_address = $request->school_address;
        $school = School::find($id);
        $school->school_name = $school_name;
        $school->school_address = $school_address;
        $school->update();
        $data['success'] = true;
        $data['messages'] = "School Successfully Updated!";
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
        School::destroy($id);
        $data['success'] = true;
        $data['messages'] = "Data Deleted Successfully.";
        return response()->json($data, 200);
    }
}
