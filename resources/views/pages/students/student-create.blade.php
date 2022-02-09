@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10">
            
<form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
     
   <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Name</label>
     <input required style="color: rgb(0, 0, 0) !important" name='name' type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
   </div>
   <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Email</label>
     <input required style="color: rgb(0, 0, 0) !important" name='email' type="email" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
   </div>
   <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Password</label>
     <input required style="color: rgb(0, 0, 0) !important" name='password' type="password" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
   </div>
   <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Address</label>
     <input required style="color: rgb(0, 0, 0) !important" name='address' type="address" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
   </div>
 
 <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Image</label>
     <input required name='image' type="file" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
   </div>
 
   <button type="submit" class="btn btn-primary">Submit</button>
 </form> 
@endsection