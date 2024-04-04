<!-- Import Template -->
@extends('src.Template.no-header')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Import Layouting -->
@section('content')
    <style>
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            /* Optional background color */
        }

        .login-container {
            max-width: 800px;
        }

        .login-btn {
            background-color: #019F90;
            color: #fff;
        }

        .login-btn {
            background-color: #019F90;
            color: #fff;
            transition: transform 0.3s;
        }

        .login-btn:hover {
            transform: scale(1.02);
            color: #fff;
            /* Resetting text color on hover */
            background-color: #019F90;
            /* Resetting background color on hover */
            box-shadow: none;
            /* Resetting box-shadow on hover */
        }

        .footer_section {
            background-color: #f8f9fa;
        }

        a.back-link {
            color: #019F90;
        }
    </style>
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container">
                        @if (session()->has('registerProcessMessage'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('registerProcessMessage') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <h2 class="text-center mb-5">Login</h2>

                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" name="employeeEmail"
                                    class="form-control @error('employeeEmail') is-invalid @enderror" required
                                    value="" id="email" autofocus>
                                @error('employeeEmail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="employeePassword" class="form-control" id="password" required>
                            </div>

                            <div class="form-group text-right">
                                <a href="" class="back-link">Kembali</a>
                            </div>

                            <button type="submit" name="login" class="btn btn-block login-btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @endsection
