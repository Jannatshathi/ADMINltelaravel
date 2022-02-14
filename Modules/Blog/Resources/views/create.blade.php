@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10">
          {{-- <x-pageheader data="Student Form" /> --}}

<form action="{{route('blog.store')}}" method="POST">
    @csrf
     
   <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Name</label>
     <input style="color: rgb(0, 0, 0) !important" name='name' type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
   </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Type</label>
    <input style="color: rgb(0, 0, 0) !important" name='type' type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>

   <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Details</label>
     <input style="color: rgb(0, 0, 0) !important" name='details' type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
   </div>
 
 
 
   <button type="submit" class="btn btn-primary">Submit</button>
 </form> 
@endsection