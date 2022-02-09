@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10">
          <x-pageheader data="Studentlist" />
            <br>

<div class="card">

  @if(session()->has('message'))
<p class="alert alert-success">
    {{session()->get('message')}}
</p>
@endif

    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>

                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
             <tbody>
              @foreach($student as $key=>$x)
              <tr>

                <td>{{$key+1}}</td>
                <td>{{$x->name}}</td>
                <td>{{$x->email}}</td>
                <td>{{$x->address}}</td>

                <td>
                  <img src="{{asset($x->image)}}" width="50px" alt="student">
                </td>
                <td>
                  <a href="{{route('student.edit',$x->id)}}" class="btn btn-primary">Edit</a>
                </td>

                <td>
                  <a  href="{{route('student.destroy',$x->id)}}" class="btn btn-danger"
                  onclick="event.preventDefault();
                   document.getElementById('delete').submit();">
                      {{ __('Delete') }}
                       </a>
  
                    <form id="delete" action="{{route('student.destroy',$x->id)}}" method="POST" class="d-none">
                  @csrf
                  @method('delete')
                 </form>
                
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
        </div>
    </div>
</div>
@endsection