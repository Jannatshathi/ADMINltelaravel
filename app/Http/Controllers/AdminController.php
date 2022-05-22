<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashboards.admins.index');
    }

    public function profile(){
        return view('dashboards.admins.profile');
    }
    public function authenticate(Request $req)
    {
       $this->validate($req,[
        'email' => 'required|email',
        'password' => 'required'
       ]);
       if(Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password],$req->get('remember'))){
        return redirect()->route('admin.dashboard');
       }
       else{
           session()->flash('error','Email or Password Incorrent Please Try Again');
           return back()->withInput($req->only('email'));
       }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
