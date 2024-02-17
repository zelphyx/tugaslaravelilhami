@extends("layouts.main")

@section('content')
    @if(session()->has("success"))
        <div class="alert alert-success col-lg-12 mt-3" role="alert">
            {{ session("success") }}
        </div>
    @endif
    @if(session()->has("LoginErr"))
        <div class="alert alert-success col-lg-12 mt-3 d-flex justify-content-between" role="alert">
            {{ session("LoginErr") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<style>
    .btn-color{
        background-color: #0e1c36;
        color: #fff;

    }

    .profile-image-pic{
        height: 200px;
        width: 200px;
        object-fit: cover;
    }



    .cardbody-color{
        background-color: #ebf2fa;
    }

    a{
        text-decoration: none;
    }

</style>


    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Login Form</h2>

                <div class="card my-5">

                    <form class="card-body cardbody-color p-lg-5" action="/login" method="post">
                        @csrf
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                                 width="200px" alt="profile">
                        </div>

                        <div class="mb-3">
                            <label for="Email">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp"
                                   placeholder="Email Address" autofocus required value={{old('email')}}>
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                            Registered? <a href="/register" class="text-dark fw-bold"> Create an
                                Account</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
