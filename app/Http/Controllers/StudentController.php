<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function create()
    {
        return view('pages.students.student-create');
    }


    public function index()
    {
        $student=Student::all();
        return view('pages.students.student-list', compact('student'));
    }


    public function store(Request $request){
        $image_name = '';
        if($request->hasfile('image'))
                 {
                    $filename = $request->image->move('images', $request->image->hashName()); 
                
                    }

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'image' => $filename,
        ]);
        
        return redirect()->route('student.index');
    }

    public function edit(Student $student)
    {
        return view('pages.students.student-edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $filename=$student->image;
        if($request->hasfile('image'))
                 {
                    $filename = $request->image->move('images', $request->image->hashName()); 
                    }

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'image' => $filename,
           

        ]);
        return redirect()->route('student.index')->with('message','Student info updated.');
    }


    public function destroy(Student $student){
       
        $student->delete();
        return redirect()->back()->with('message', 'student deleted');
    }
    public function show(Student $student){
        return $student;
    }
}
