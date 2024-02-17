<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../../Users/ASUS/AppData/Local/Temp/dashboard.css" rel="stylesheet">
</head>
<body>



<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/dashboard/all">Ini Navbar</a>
    @auth
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/homeafter">Home</a></li>
                <li>
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth
</header>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">

                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="height: 100vh; position: relative;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard/all">
                                <i class="bi bi-house-door-fill bi-lg"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/student/all">
                                <i class="bi bi-person-fill"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/class/all">
                                <i class="bi bi-building-fill"></i>
                                Classes
                            </a>
                        </li>
{{--                        <li class="nav-item mt-5 mx-5">--}}
{{--                            <a type="button" class="btn btn-success" href="/student/create"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">--}}
{{--                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>--}}
{{--                                </svg> Add New Student Data</a>--}}
{{--                        </li>--}}
                    </ul>

                </div>

            </div>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

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

                    @auth
                        <a type="button" class="btn btn-success" href="/student/create"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                            </svg> Add New Data</a>
                    @endauth
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
                                    <input type="text" value="{{request('search')}}" class="form-control " placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
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
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td class="table-warning">{{ $students->NIS }}</td>
                                    <td class="table-warning">{{ $students->Nama }}</td>
                                    <td class="table-warning">{{ $students->kelasaaaaaaaaaaaaaaaa->Nama ?? 'Class not Found'}}</td>

                                    <td class="table-warning center-buttons">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $students->id }}">
                                            Detail
                                        </button>
                                        <a type="button" class="btn btn-secondary" href="/student/detail/{{$students->id}}">Detail Student</a>
                                        <a type="button" class="btn btn-success" href="/student/edit/{{$students->id}}">Edit</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $students->id }}">
                                            Hapus
                                        </button>
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
                        <li><a class="dropdown-item" href="/dashboard/student/all">Show All</a></li>
                        @foreach ($kelas as $item)
                            <li><a class="dropdown-item" href="{{ route('student.filter.dashboard', $item->id) }}">{{ $item->Nama }}</a></li>
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


            </div>
        </main>
    </div>
</div>
<script src="dashboard.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
