@extends('layouts.app')
@section('content')
    {{ Auth::user()->name }}
    <h1>Admin Dashboard</h1>
@endsection
