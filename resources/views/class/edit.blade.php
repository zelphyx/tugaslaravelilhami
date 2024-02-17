@extends("layouts.main")

@section('content')
    <h2>Edit Student Data</h2>
    <form method="POST" action="/class/update/{{$kelas->id}}">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control border border-black p-3 fs-6" id="Nama" name="Nama" aria-describedby="emailHelp" value="{{ old('Nama', $kelas->Nama) }}">
        </div>

        <button type="submit" class="btn btn-success mt-4 p-3">Edit Class</button>
    </form>
@endsection
