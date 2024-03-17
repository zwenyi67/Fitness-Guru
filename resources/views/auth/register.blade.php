<x-layout>



    <div style="height: 100%; min-height: 90vh;" class="container mt-5">

        <div class="container d-flex justify-content-center mb-5">
            <div class="row d-flex">
                <div class="col-md-12 d-flex">
                    <a style="padding: 0px 35px;" class="{{ request('trainer') ? 'bmi' : 'bmiactive' }} py-3 me-3" href="/register">
                        Sign Up as User
                    </a>
                    <a class="{{ request('trainer') ? 'bmiactive' : 'bmi' }} py-3 ms-3" href="/register?trainer=sign">
                        Register as Trainer
                    </a>
                </div>
            </div>
        </div>

        <div class="tab {{ request('trainer') ? 'active' : '' }}">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <h2>TRAINER &nbsp;REGISTRATION &nbsp;FORM</h2>
                @livewire('multi-step-form')
            </div>
        </div>
        </div>
        <div class="tab {{ request('trainer') ? '' : 'active' }}">

        <div class="row d-flex justify-content-center ">
            <div class="col-lg-8">
                <h2>REGISTRATION &nbsp;FORM</h2>
                <div>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                Please fill out form completely !
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="name" class=" text-md-end">{{ __('First Name') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name" value="{{ old('first_name') }}" required
                                                autocomplete="first_name" autofocus>

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="name" class=" text-md-end">{{ __('Last Name') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" value="{{ old('last_name') }}" required
                                                autocomplete="last_name" autofocus>

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="email" class=" text-md-end">{{ __('Email') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="phone" class=" text-md-end">{{ __('Phone') }}</label>
                                            <input id="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="address" class="text-md-end">{{ __('Address') }}</label>

                                            <input id="address" type="text"
                                                class="form-control @error('address') is-invalid @enderror"
                                                name="address" value="{{ old('address') }}" required
                                                autocomplete="address">

                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="image" class="text-md-end">{{ __('Photo') }}</label>

                                            <input id="image" type="file"
                                                class="form-control @error('image') is-invalid @enderror" name="image"
                                                value="{{ old('image') }}" required autocomplete="image">

                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="password" class="text-md-end">{{ __('Password') }}</label>

                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="password-confirm"
                                                class="text-md-end">{{ __('Confirm Password') }}</label>

                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                                            {{ __('REGISTER') }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>



    <script>
        /* 
                    <div class="input-group">
                                                        <input type="file" class="form-control" name="body_images"
                                                        id="body_images">
                                                        <button class="btn btn-primary" onclick="addInput()"> + </button>
                                                    </div>

                                                    <div id="input-group" class="input-group mt-3">
                                                        <!-- Inputs will be dynamically added here -->
                                                    </div>
                    
                    
                    let inputCount = 0;

            function addInput() {

                if (inputCount < 6) {
                inputCount++;

                const inputContainer = document.getElementById('input-group');

                const inputDiv = document.createElement('div');
                inputDiv.classList.add('input-group');

                const input = document.createElement('input');
                input.classList.add('form-control', 'mt-3')
                input.type = 'file';
                input.name = 'dynamicInput' + inputCount;

                const removeButton = document.createElement('button');
                removeButton.classList.add('btn', 'btn-danger')
                removeButton.textContent = ' - ';
                removeButton.onclick = function () {
                    inputContainer.removeChild(inputDiv);
                };

                inputDiv.appendChild(input);
                inputDiv.appendChild(removeButton);

                inputContainer.appendChild(inputDiv);
            }
            } */
    </script>



</x-layout>
