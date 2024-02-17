@extends('layouts.main')

@section('content')
    <h2>Student Detail</h2>
    <div class="form">
        <div class="form-group my-1">
            <label for="">NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" value="{{$student -> NIS}}" disabled>
        </div>
        <div class="form-group my-ip">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $student-> Nama }}" disabled>
        </div>
        <div class="form-group/my-1">
            <label for="">Tanggal Lahir</label>
            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $student->tgl_lahir }}" disabled>

            <div class="form-group-my-1">
                <label for="">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $student->alamat }}" disabled>

                <div class="form-group my-1">
                    <label for="">Kelas</label>
                    <input type="text" class="form-control" name="kelas" id="kelas" value="{{ $student->kelasaaaaaaaaaaaaaaaa->Nama  }}" disabled>
                </div>
            </div>
@endsection

