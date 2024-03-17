<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</head>
<body>
    


 <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-5 fw-semibold">{{ __('Admin Login') }}</div>

                    <div class="card-body mt-3">
                        <form method="POST" action="/6704/fitnessguru/admin/login">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4 px-3">
                                    <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div> 
    





{{-- <div class="container mt-5">
    <div class="row d-flex justify-content-center">
    <div class="col-lg-6">
        <div class="card p-4">
            <div style="background: none;" class="card-header">
                ADMIN LOGIN
            </div>
            <div class="card-body mt-3">
                <form action="/6704/admin/login" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="">EMAIL</label>
                        <input type="text" class="form-control" name="email" id="email">
                        @error('email')
                            <p class="text-danger text-sm ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="">PASSWORD</label>
                        <input type="text" class="form-control" name="password" id="password">
                        @error('password')
                            <p class="text-danger text-sm ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary px-3 fw-semibold">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div> --}}

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> 


</body>
</html>