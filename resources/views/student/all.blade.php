@extends("layouts.main")

@section('content')
<style>
    /* Style the table */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    /* Style table headings */
    .table th {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
    }

    /* Style table cells */
    .table td {
        text-align: center;
        padding: 10px;
    }

    /* Center align text in action column */
    .center-buttons {
        text-align: center;
    }

    /* Style the action buttons */
    .btn {
        margin-right: 5px;
    }

    /* Style the modal header */
    .modal-header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 15px;
    }

    /* Style the modal body */
    .modal-body {
        text-align: center;
        padding: 15px;
    }

    /* Style the modal footer */
    .modal-footer {
        background-color: #eee;
        text-align: center;
        padding: 15px;
    }

</style>

{{--@auth--}}
{{--<a type="button" class="btn btn-success" href="/student/create"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">--}}
{{--        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>--}}
{{--    </svg> Add New Data</a>--}}
{{--@endauth--}}
@if(session()->has("success"))
    <div class="alert alert-success col-lg-12 mt-3" role="alert">
        {{ session("success") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has("worked"))
    <div class="alert alert-danger col-lg-12 mt-3" role="alert">
        {{ session("worked") }}
    </div>
@endif
@if(session()->has("updated"))
    <div class="alert alert-warning col-lg-12 mt-3" role="alert">
        {{ session("updated") }}
    </div>
@endif


    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/student/all">
                <div class="input-group mb-3">
                    <input type="text" value="{{request('search')}}" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
                    <button class="btn btn-success" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped-columns">
        <thead>
        <tr>
            <th scope="col" class="table-dark">Nomor </th>
            <th scope="col" class="table-dark">NIS</th>
            <th scope="col" class="table-dark">Nama</th>
            <th scope="col" class="table-dark">Kelas</th>
            <th scope="col" class="table-dark center-buttons">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($student) > 0)
        @php
            $nomor = 1;
        @endphp
        @foreach($student as $students)
            <tr>
                <th scope="row">{{ ($student->currentPage() - 1) * $student->perPage() + $loop->iteration }}</th>
                <td class="table-warning">{{ $students->NIS }}</td>
                <td class="table-warning">{{ $students->Nama }}</td>
                <td class="table-warning">{{ $students->kelasaaaaaaaaaaaaaaaa->Nama ?? 'Class not Found'}}</td>

                    <td class="table-warning center-buttons">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $students->id }}">
                            Detail
                        </button>
                        <a type="button" class="btn btn-secondary" href="/student/detail/{{$students->id}}">Detail Student</a>
{{--                        @auth--}}
{{--                        <a type="button" class="btn btn-success" href="/student/edit/{{$students->id}}">Edit</a>--}}
{{--                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $students->id }}">--}}
{{--                            Hapus--}}
{{--                        </button>--}}
{{--                        @endauth--}}
                    </td>

            </tr>

            <!-- Modal for the current student -->
            <div class="modal fade" id="staticBackdrop{{ $students->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $students->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel{{ $students->id }}">Detail Student</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Alamat: {{ $students->alamat }}</p>
                            <p class="text-center">Tanggal Lahir: {{ $students->tgl_lahir }}</p>
                            <!-- Add other student information here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="deleteModal{{ $students->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{ $students->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel{{ $students->id }}">Konfirmasi Hapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Apakah Anda yakin ingin menghapus nama {{$students->Nama}} ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="/student/delete/{{$students->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        </tbody>

    </table>
<div class="dropdown ms-4">
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Filter by Class
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/student/all">Show All</a></li>
        @foreach ($kelas as $item)
            <li><a class="dropdown-item" href="{{ route('student.filter', $item->id) }}">{{ $item->Nama }}</a></li>
        @endforeach
    </ul>
</div>
<div class="d-flex justify-content-end bg-white">
    {{$student->links()}}
</div>
@else
    <div class="text-center mt-3">
        <p class="alert alert-info fs-1">NO DATA</p>
    </div>
@endif




@endsection
