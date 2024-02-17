@extends("layouts.main")

@section('content')
    <h1 class="h2"> Hello, {{ auth()->user()->name }}</h1>
@endsection
