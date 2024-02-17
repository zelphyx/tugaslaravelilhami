@extends("layouts.main")

@section('content')
    <h2>Edit Student Data</h2>
    <form method="POST" action="/student/update/{{$student->id}}">
        @csrf
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">NIS</label>
            <input type="number" class="form-control border border-black p-3 fs-6" id="NIS" name="NIS" aria-describedby="emailHelp"  value="{{old('NIS',$student->NIS)}}">
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control border border-black p-3 fs-6" id="Nama" name="Nama" aria-describedby="emailHelp" value="{{old('Nama',$student->Nama)}}">
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Kelas</label>
            <select class="form-select" name="id_kelas" id="id_kelas">
                @foreach($kelas as $class)
                    <option value="{{$class->id}}" {{ $student->id_kelas == $class->id ? 'selected' : '' }}>
                        {{ $class->Nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Alamat</label>
            <input type="text" class="form-control border border-black p-3 fs-6" id="alamat" name="alamat" aria-describedby="emailHelp" value="{{old('alamat',$student->alamat)}}">
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control border border-black p-3 fs-6" id="tgl_lahir" name= "tgl_lahir" aria-describedby="emailHelp" value="{{old('tgl_lahir',$student->tgl_lahir)}}">
        </div>
        <button type="submit" class="btn btn-success mt-4 p-3" >Edit Student</button>



    </form>
@endsection
