@extends("layouts.main")

@section('content')
    <div class="mx-auto p-2" style="width: 200px;">
        <h2>Ini Adalah Halaman About</h2>
        <h2>{{ auth()->user()->name }}</h2>
        <h2>{{$kelas}}</h2>
        <img src="{{$foto}}">
    </div>

@endsection
