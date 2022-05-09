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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Multi Image</div>
                    <div class="card-body">


            {{-- <x-pageheader data="Student Form" /> --}}

            <form action="{{ route('store.image') }} " method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input name='image[]' type="file" class="form-control" id="exampleInputText"
                        aria-describedby="emailHelp" multiple>
                </div>

                <button type="submit" class="btn btn-primary">Add Image</button>
            </form>
        </div>
    </div>
    <div class="card-group">
        @foreach ($images as $multi)
        <div class="col-md-4 mt-5">
            <div class="card">
                <img src="{{ asset($multi->images) }}" alt="">
            </div>
        </div>

        @endforeach
    </div>

        </div>
    </div>
</div>
@endsection
