{{-- @extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <h1 class="h3 mt-3 mb-3 fw-normal text-center">Register</h1>
    <form method="POST" action="/register" class="col-lg-6">
        @csrf
        <div class="mb-2">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword" name="confirmPassword" value="{{ old('confirmPassword') }}">
            @error('confirmPassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg mt-3 text-light" style="background-color: #00A19D" type="submit">Register</button>
        <small class="d-block text-center mt-3">Already register? <a href="/login">Login</a></small>
    </form>
</div>

@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/registerStyle.css">
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
    <section class="vh-100 background-image" style="background-image: url('img/backgroundRegister.png'); background-size: cover" >
        <div class="mask d-flex align-items-center h-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h1 class="mt-1 mb-3 pb-1 fw-bold text-center">REGISTER</h1>
                                <h3 class="mt-1 mb-5 pb-1 text-center" style=" color: #0EA698;">Let’s be our dropshipper member</h3>
                                <form method="POST" action="/register">
                                    @csrf
                                    <div class="form-outline mb-3">
                                        <input type="username" id="username" name="username" class="form-control py-2 @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}"/>
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="email" id="email" name="email" class="form-control py-2 @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}"/>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="password" id="password" name="password"  class="form-control py-2 @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}" />
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="password" class="form-control py-2 @error('confirmPassword') is-invalid @enderror" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" value="{{ old('confirmPassword') }}"/>
                                        @error('confirmPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2 @error('term') is-invalid @enderror" type="checkbox" id="term" name="term"/>
                                        <label class="form-check-label" for="term">I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" style="width: 60%;"
                                        class="btn btn-block btn-lg gradient-custom-4 py-3 rounded-pill text-white">Register</button>
                                    </div>


                                    <p class="text-center text-muted mt-1">Have already an account? <a href="/login"
                                        class="fw-bold text-body"><u>Login here</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-dark text-center text-black">
        <div class="text-center p-3" style="background-color: #FFF8E5;">
            DropShops © 2021
        </div>
    </footer>
</body>

</html>