@extends("layouts.main")

@section('content')
    <h2>Add New Data Student</h2>
    <form method="POST" action="/class/add">
        @csrf

        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control border border-black p-3 fs-6" id="Nama" name="Nama" aria-describedby="emailHelp" value="{{old('Nama')}}">
        </div>
        <button type="submit" class="btn btn-success mt-4 p-3" >Add New Class</button>

    </form>
@endsection
