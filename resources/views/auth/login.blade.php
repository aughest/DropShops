{{-- @extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7 col-sm-9">
        <main class="form-register">
            <h1 class="h3 mt-3 mb-3 fw-normal text-center">Login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="mb-2">
                    <label for="email" class="form-label">E-mail Address</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <button class="w-100 btn btn-lg mt-3 text-light" style="background-color: #00A19D" type="submit">Login</button>
                
                @if (session('error'))
                    <div class="alert alert-danger mt-2">
                        {{ session('error') }}
                    </div>
                @endif
            </form>
            <small class="d-block text-center mt-3">Don't have account yet? <a href="/register">Register</a></small>
        </main>
    </div>
</div>

@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>DropShops</title>

</head>

<body>
    <section class="h-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <!-- KIRI -->
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <a href="/"><img src="img/DropShops.png" style="width: 230px;" alt="logo"></a>
                                        <h2 class="mt-1 mb-5 pb-1 fw-bold">Login to Your Account</h2>
                                    </div>

                                    <form action="/login" method="post">
                                        @csrf
                                        <hr class="mb-4">
                                        <div class="form-outline mb-3">
                                            <input type="email" id="email" name="email" class="form-control py-2 @error('email') is-invalid @enderror" placeholder="Email" value="{{ Cookie::get('email') !== null ? Cookie::get('email') : old('email') }}"/>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="password" id="password" class="form-control py-2 @error('password') is-invalid @enderror" placeholder="Password"  name="password" value="{{ old('password') }}"/>
                                            {{-- <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="password"> --}}
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                            <label class="form-check-label" for="remember">Remember Me</label>
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-block fa-lg gradient-custom-2 mb-3 py-3 rounded-pill text-white" style="width: 60%;" type="submit">Sign In</button>
                                            <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- KANAN -->
                            <div id="kanan" class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h2 class="mt-1 mb-5 pb-1 fw-bold text-center">New Here?</h2>
                                    <p class="text-center mb-5">
                                        DropShops is a B2B dropshipping platform that offers transactions between suppliers and online businesses. Let's register and become our Dropshipper member</p>
                                        <div class="text-center pt-1 pb-1">
                                            <a href="/register" class="btn btn-block fa-lg py-3 rounded-pill bg-white text-dark fw-bold shadow" style="width: 60%;"
                                                type="button">Sign up</a>
                                            <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-center text-black mt-40 ">
        <div class="text-center p-3" style="background-color: #FFF8E5;">
            DropShops © 2021
        </div>
    </footer>
</body>

</html>