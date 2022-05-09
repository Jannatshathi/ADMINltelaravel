<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Student;
use App\Models\Multipic;
use App\Models\StudentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\Studentstore;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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


    public function store(Studentstore $request){

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
        ]);

        foreach ($request->attachments as $attachment) {
            $filename = $attachment->move('images', $attachment->hashName());

            StudentImage::create([
                'student_id' => $student->id,
                'image' => $filename,
            ]);
        }

        return redirect()->route('student.index');

        // return  $student->attachments;


        // $image_name = '';
        // $files = $request->file('attachment');
        // if($request->hasFile('attachment'))
        //          {
        //              foreach ($files as $filename){
        //                 $filename = $request->attachment->move('images', $request->attachment->hashName());
        //              }
        //             }

        // return redirect()->route('student.index');
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

    
///multiimage
    public function multiImage(){
        $images = Multipic::all();
        return view('pages.multipic.index', compact('images'));
    }

    public function storeImage(Request $request){
        foreach($request->image as $img){
                if($img){
                          $imageName = time() . '_' . uniqid() . '.' .$img->getClientOriginalExtension();
                          Storage::putFileAs('public/gallery', $img, $imageName);
                $url = 'storage/gallery/' . $imageName;
                Multipic::create([
                    'image' => $url,

                ]);
            }
        }

        return redirect()->back();
    }
}
