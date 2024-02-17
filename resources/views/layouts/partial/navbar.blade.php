<nav class="navbar navbar-expand-lg bg-white border border-5">
    <div class="container-fluid">



        @auth
            <a class="navbar-brand text-black fw-bold " href="/homeafter">Website Data Siswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-black " aria-current="page" href="/homeafter">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="/about">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="/student/all">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="/class/all">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="/extra">ExtraCurricular</a>
                    </li>

                </ul>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form method="get" action="/admindashboard">
                                @csrf
                                <button type="submit" class="dropdown-item">Dashboard</button>
                            </form>
                            <form method="post" action="/logout">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        @else
            <a class="navbar-brand text-black fw-bold " href="/home">Website Data Siswa</a>
            <!-- If not authenticated, show these links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-black " href="/student/all">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black " href="/extra">Extracurricular</a>
                </li>
            </ul>
            <form class="d-flex row-gap-3" role="search">
                <a class="btn btn-success" href="/register">Register</a>
                <a class="btn btn-success" href="/login">Login</a>
            </form>
        @endauth
    </div>
</nav>
