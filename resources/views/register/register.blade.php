@extends("layouts.main")

@section('content')
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
                <h2 class="text-center text-dark mt-5">Regisration Form</h2>

                <div class="card my-5">

                    <form class="card-body cardbody-color p-lg-5" action="/register" method="POST">
                        @csrf
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                                 width="200px" alt="profile">
                        </div>
                        <div class="mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                                                             placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                                              placeholder="Email Address">
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            <label for="username">Username</label>--}}
{{--                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">--}}
{{--                        </div>--}}
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-color px-5 mb-5 w-100">Register</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Already Have an Account <a href="/login"  class="text-dark fw-bold"> Sign In</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
