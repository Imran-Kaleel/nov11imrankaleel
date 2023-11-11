<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class StudentController extends Controller
{
    public function index()
    {
        $student = Student::with('subject')->get();
        // return Response::json($student);
        // dd($student->subject);
        return view('index', ['students' => $student]);
    }

    public function add()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'english' => 'required',
            'maths' => 'required',
            'history' => 'required',
        ]);

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->country = $request->country;
        $student->save();

        $subject = new subject;
        $subject->name = $request->name;
        $subject->english =  $request->english;
        $subject->maths =  $request->maths;
        $subject->history =  $request->history;
        $subject->student_id = $student->id;

        $subject->save();

        return back();
    }

    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        return view('edit', ['student' => $student]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'english' => 'required',
            'maths' => 'required',
            'history' => 'required',
        ]);

        $student = Student::where('id', $id)->first();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->country = $request->country;
        $student->save();

        $subject = subject::where('student_id', $id)->first();
        $subject->name = $request->name;
        $subject->english =  $request->english;
        $subject->maths =  $request->maths;
        $subject->history =  $request->history;
        $subject->student_id = $student->id;
        $subject->save();

        return back();
    }

    public function delete($id)
    {   
        $subject = subject::where('student_id', $id)->first();
        $subject->delete();

        $student = Student::where('id', $id)->first();
        $student->delete();
        return back();
    }

    public function updateStatus($id)
    {

        $student = Student::where('id', $id)->first();
        $student->status = !$student->status;
        $student->save();

        return response()->json($student);
    }
}
