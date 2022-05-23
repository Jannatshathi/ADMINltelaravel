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
use Brian2694\Toastr\Facades\Toastr;

class StudentController extends Controller
{
    public function create()
    {
        return view('pages.students.student-create');
    }


    public function index()
    {
        $student=Student::with('images')->get();
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
            if($attachment){
                //$filename = $attachment->move('images', $attachment->hashName());

                $imageName = time() . '_' . uniqid() . '.' .$attachment->getClientOriginalExtension();
                      Storage::putFileAs('public/gallery', $attachment, $imageName);
                        $url = 'storage/gallery/' . $imageName;

                StudentImage::create([
                    'student_id' => $student->id,
                    'image' => $imageName,
                ]);
            }

        }

        Toastr::success('Student Create Successfully', 'Success', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,"showDuration"=> "500",]);
        //return redirect()->route('student.index');
        return back();

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
        $this->validate($request, [

            'image' => 'required|image',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
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
