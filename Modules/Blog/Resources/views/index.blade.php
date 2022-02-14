@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
              <x-pageheader data1="Studentlist" data2="Home" data3="Studentlist"/>
              
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
                    <th scope="col">Type</th>
                    <th scope="col">Details</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                 <tbody>
                  @foreach($blogs as $key=>$blog)
                  <tr>
    
                    <td>{{$key+1}}</td>
                    <td>{{$blog->name}}</td>
                    <td>{{$blog->type}}</td>
                    <td>{{$blog->details}}</td>
    
                    
                    <td>
                      <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-primary">Edit</a>
                    </td>
    
                    <td>
                      <a  href="{{route('blog.destroy',$blog->id)}}" class="btn btn-danger"
                      onclick="event.preventDefault();
                       document.getElementById('delete').submit();">
                          {{ __('Delete') }}
                           </a>
      
                        <form id="delete" action="{{route('blog.destroy',$blog->id)}}" method="POST" class="d-none">
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
