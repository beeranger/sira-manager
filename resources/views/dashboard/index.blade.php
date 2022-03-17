@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 mx-3 border-bottom bg-white">
    <h1 class="h2">Hi, {{ auth()->user()->name }}</h1>
</div>
@endsection