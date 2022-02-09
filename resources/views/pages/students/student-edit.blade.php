@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-10">



<form action="{{route('student.update', $student->id)}}" method="POST" enctype="multipart/form-data">
    @method('put')
   @csrf
    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input required style="color: rgb(0, 0, 0) !important" value="{{$student->name}}" name='name' type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input required style="color: rgb(0, 0, 0) !important" value="{{$student->email}}"  name='email' type="email" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Change Password</label>
    <input required style="color: rgb(0, 0, 0) !important"   name='password' type="password" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">New Password</label>
    <input required style="color: rgb(0, 0, 0) !important"  name='password' type="password" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input required style="color: rgb(0, 0, 0) !important" value="{{$student->address}}"  name='address' type="address" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input  value="{{$student->image}}" name='image' type="file" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>

  <button type="update " class="btn btn-primary">Update</button>
</form> 
@endsection