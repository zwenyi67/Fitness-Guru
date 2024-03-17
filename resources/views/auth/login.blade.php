<x-layout>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">

            <div class="col-md-8">

                @if (request()->has('login'))
                    <div class="alert alert-danger text-center fw-semibold">
                       Hey Friend, Please login first. If you don't have an account, <a href="/register">Sign Up</a> now ! 
                    </div>
                @endif
            </div>

        </div>
        <div class="row d-flex justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-5 fw-semibold">{{ __('Login') }}</div>

                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('login') }}">
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

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-dark px-4 fw-semibold">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div style="padding: 0" class="col-md-8 offset-md-4">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div style="padding: 0" class="col-md-8 offset-md-4">
                                    @if (Route::has('register'))
                                        <p style="padding-left: 13px;"> Don't have an account ?
                                            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="mb-3  d-flex justify-content-center">
                            <p class="ms-3"> Don't have an account ?
                                <a class="" href="/register0/">Register</a>
                            </p>
                        </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
