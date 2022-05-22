@extends('layouts.app')
<a href="{{ route('admin.logout') }}" class="list-group-item list-group-item-action text-danger">Logout</a>
@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">{{ __('User Dashboard') }}</div>
            <div class="card-body">
                <div class="alert alert-success text-center" role="alert">
                    WellCome To User Dashboard
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                Hi , {{ Auth::user()->name }}
                </br>
                <span>User mail : {{ Auth::user()->email }}</span>
                </br>
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
@endsection
