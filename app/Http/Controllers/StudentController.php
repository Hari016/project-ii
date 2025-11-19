<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentProfile;
use App\Models\StudentFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = new Student();

        return view('student.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = '';
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/images'), $image);
        }

        $student = new Student();
        $student->name = $request->name;
        $student->contact = $request->contact;
        $student->address = $request->address;
        $student->image = $image;
        $student->save();
        return redirect()->route('student.index');
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
        $student = Student::findorfail($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = student::findorfail($id);

        $image = '';
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/images'), $image);
        }

        $data->name = $request->name;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->image = $image;
        $data->save();
        return Redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Student::findorfail($id);
        $data->delete();
        return Redirect()->route('student.index');
    }
     public function profile(string $id)
    {
        $data = Student::findorfail($id);
        return view('student.profile', compact('data'));
    }
    public function profileupdate(Request $request)
    {
       $data = new StudentProfile();
         $data->student_id = $request->student_id;
        $data->bio = $request->bio;
        $data->class = $request->class;
        $data->save();
        return Redirect()->route('student.index');
    }
    public function fees(string $id)
    {
        $data = Student::with('fees')->findorfail($id);
        return view('student.fees', compact('data'));
    }
    public function pay(string $id)
    {
        $data = Student::findorfail($id);
        return view('student.pay', compact('data'));
    }
    public function feesStore(Request $request)
    {
        $data = new StudentFee();
        $data->student_id = $request->student_id;      
        $data->amount = $request->amount;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->save();
        return Redirect()->route('student.index');
    }

}
