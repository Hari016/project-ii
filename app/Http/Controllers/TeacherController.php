<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\teacherProfile;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Provide a new Teacher instance for the create form (no $id required)
        $teacher = new Teacher();

        return view('teacher.create', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storet(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->contact = $request->contact;
        $teacher->address = $request->address;
        $teacher->save();
        return redirect()->route('teacher.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher.edit', compact('teacher'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function updatet(Request $request, string $id)
    {
        $data = Teacher::findOrFail($id);
        $data->name = $request->name;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->save();
        return redirect()->route('teacher.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Teacher::findOrFail($id);
        $data->delete();
        return redirect()->route('teacher.index');
    }
      public function profile(string $id)
    {
        $data = Teacher::findorfail($id);
        return view('teacher.profile', compact('data'));
    }
    public function profileupdate(Request $request)
    {
       $data = new teacherProfile();
         $data->teacher_id = $request->teacher_id;
         $data->organization_name = $request->organization_name;
        $data->bio = $request->bio;
        $data->post = $request->post;
        $data->save();
        return Redirect()->route('teacher.index');
    }
}
