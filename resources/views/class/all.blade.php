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


{{--    <a type="button" class="btn btn-success" href="/class/create"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">--}}
{{--            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>--}}
{{--        </svg> Add New Data</a>--}}
    @if(session()->has("success"))
        <div class="alert alert-success col-lg-12 mt-3" role="alert">
            {{ session("success") }}
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

    <table class="table table-striped-columns">
        <thead>
        <tr>
            <th scope="col" class="table-dark">Nomor </th>

            <th scope="col" class="table-dark">Nama Kelas</th>

{{--            <th scope="col" class="table-dark center-buttons">Action</th>--}}
        </tr>
        </thead>
        <tbody>
        @if(count($kelas) > 0)
            @php
                $nomor = 1;
            @endphp
            @foreach($kelas as $item)
                <tr>
                    <th scope="row" class="table-secondary">{{ $nomor++ }}</th>

                    <td class="table-warning">{{ $item->Nama }}</td>

{{--                    <td class="table-warning center-buttons">--}}

{{--                        <a type="button" class="btn btn-success" href="/class/edit/{{$item->id}}">Edit</a>--}}
{{--                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">--}}
{{--                            Hapus--}}
{{--                        </button>--}}

{{--                    </td>--}}
                </tr>
                <div class="modal fade" id="deleteModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Apakah Anda yakin ingin menghapus Kelas {{$item->Nama}} ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="/class/delete/{{$item->id}}" method="POST">
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
    @else
        <div class="text-center mt-3">
            <p class="alert alert-info fs-1">NO DATA</p>
        </div>
    @endif

@endsection
