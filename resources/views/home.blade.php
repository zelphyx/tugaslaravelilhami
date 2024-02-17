@extends("layouts.main")

@section('content')

    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 80vh;">
        <h1 class="fw-bold text-center" >Welcome to Website Data Siswa </h1>
        <h4 class="fw-light fs-2 mb-5">Login First </h4>

        <div class="d-flex gap-4 ">
        <a class="btn btn-success py-3 px-5 fs-5 fw-bolder " href="/register">Register</a>
        <a class="btn btn-success py-3 px-5 fs-5 fw-bolder" href="/login">Login</a>
        </div>


    </div>


@endsection
