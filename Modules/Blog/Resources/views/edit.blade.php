@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-10">



<form action="{{route('blog.update', $blog->id)}}" method="POST">
    @method('put')
   @csrf
    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input required style="color: rgb(0, 0, 0) !important" value="{{$blog->name}}" name='name' type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input required style="color: rgb(0, 0, 0) !important" value="{{$blog->type}}" name='type' type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input required style="color: rgb(0, 0, 0) !important" value="{{$blog->details}}" name='details' type="text" class="form-control" id="exampleInputText" aria-describedby="emailHelp">
  </div>
  



  <button type="update " class="btn btn-primary">Update</button>
</form> 
@endsection