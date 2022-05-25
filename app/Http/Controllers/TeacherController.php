<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Imports\TeacherImport;
use Excel;

class TeacherController extends Controller
{
    public function index(){
        return view('dashboards.teachers.index');
    }

    public function profile(){
        return view('dashboards.teachers.profile');
    }
    public function authenticate(Request $req)
    {
       $this->validate($req,[
        'email' => 'required|email',
        'password' => 'required'
       ]);

       if(Auth::guard('teacher')->attempt(['email' => $req->email, 'password' => $req->password],$req->get('remember'))){
        return redirect()->route('teacher.dashboard');
       }
       else{
           session()->flash('error','Email or Password Incorrect Please Try Again');
           return back()->withInput($req->only('email'));
       }
    }
    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
    }

    public function importForm(){
        return view('teacher.import');

    }

    public function import(Request $request){
        Excel::import(new TeacherImport,$request->file);
        return "Record are imported successfully!";
    }

}
