<x-frame>
    <div class="container-fluid mt-5">
        <div class="container d-flex justify-content-center mb-5">
            <div class="row d-flex">
                <div class="col-md-12 d-flex">
                    <a class="px-5 py-3 reg-btn me-3" href="/register">
                        Register as a member
                    </a>
                    <a class="px-5 py-3 reg-btn ms-3" href="/register?trainer=sign">
                        Register as a trainer
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card tab {{ request('trainer') ? '' : 'active' }}">
                    <div class="card-header">{{ __('Register as a Member') }}</div>

                    {{-- Member Register --}}
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                            @csrf

                            <input type="hidden" name="status" value="1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="name" class=" text-md-end">{{ __('Name') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                                value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
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
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                            <div class="d-flex">
                                                <div class="form-check me-5">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="male" value="1"
                                                        {{ old('gender') == '1' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="male">Male</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="female" value="0"
                                                        {{ old('gender') == '0' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>
                                            </div>
                                            @error('gender')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="dateofbirth"
                                                class="text-md-end">{{ __('Date of Birth') }}</label>

                                            <input id="dateofbirth" type="date"
                                                class="form-control @error('dateofbirth') is-invalid @enderror"
                                                name="dateofbirth" value="{{ old('dateofbirth') }}" required
                                                autocomplete="dateofbirth">

                                            @error('dateofbirth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="height"
                                                        class="text-md-end">{{ __('Height in Cm') }}</label>

                                                    <input id="height" type="number"
                                                        class="form-control @error('height') is-invalid @enderror"
                                                        name="height" value="{{ old('height') }}" required
                                                        autocomplete="height">

                                                    @error('height')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="weight"
                                                        class="text-md-end">{{ __('Weight in Kg') }}</label>

                                                    <input id="weight" type="number"
                                                        class="form-control @error('weight') is-invalid @enderror"
                                                        name="weight" value="{{ old('weight') }}" required
                                                        autocomplete="weight">

                                                    @error('weight')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
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
                            </div>

                            <div class="container">
                                <div class="row">
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
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="description" class="text-md-end">{{ __('Description') }}</label>

                                        <input id="description" type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}" required
                                            autocomplete="description">

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="reg-btn px-5 py-2">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>






















                {{-- Trainer Register --}}

                <div class="card tab d-none {{ request('trainer') ? 'active' : '' }}">
                    <div class="card-header">{{ __('Register as a Trainer') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="name" class=" text-md-end">{{ __('Name') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required
                                                autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="email" class=" text-md-end">{{ __('Email') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="phone" class="text-md-end">{{ __('Phone') }}</label>

                                            <input id="phone" type="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" required
                                                autocomplete="phone">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                            <div class="d-flex">
                                                <div class="form-check me-5">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="male" value="1"
                                                        {{ old('gender') == '1' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="male">Male</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="female" value="0"
                                                        {{ old('gender') == '0' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>
                                            </div>
                                            @error('gender')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="dateofbirth"
                                                class="text-md-end">{{ __('Date of Birth') }}</label>

                                            <input id="dateofbirth" type="date"
                                                class="form-control @error('dateofbirth') is-invalid @enderror"
                                                name="dateofbirth" value="{{ old('dateofbirth') }}" required
                                                autocomplete="dateofbirth">

                                            @error('dateofbirth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="height"
                                                        class="text-md-end">{{ __('Height in Cm') }}</label>

                                                    <input id="height" type="number"
                                                        class="form-control @error('height') is-invalid @enderror"
                                                        name="height" value="{{ old('height') }}" required
                                                        autocomplete="height">

                                                    @error('height')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="weight"
                                                        class="text-md-end">{{ __('Weight in Kg') }}</label>

                                                    <input id="weight" type="number"
                                                        class="form-control @error('weight') is-invalid @enderror"
                                                        name="weight" value="{{ old('weight') }}" required
                                                        autocomplete="weight">

                                                    @error('weight')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label class="text-md-end">{{ __('Specialization') }}</label>
                                            <select  class="form-select form-control @error('specialization') is-invalid @enderror
                                            " name="specialization" id="specialization" required
                                            autocomplete="weight">
                                                <option value="0" selected>Select the specialization</option>
                                                 @foreach ($specializations as $specialization) 
                                                    <option value="{{ $specialization->id }}"
                                                        {{ old('specialization') == $specialization->id ? 'selected' : '' }}>
                                                        {{ ucwords($specialization->type) }}
                                                    </option>
                                                 @endforeach 
                                            </select>

                                            @error('specialization')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-4">
                                            <label for="experience"
                                                class="text-md-end">{{ __('Experience in Year') }}</label>
                                            <input id="experience" type="number" min="1"
                                                class="form-control @error('experience') is-invalid @enderror"
                                                name="experience" value="{{ old('experience') }}" required
                                                autocomplete="experience">

                                            @error('experience')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="mb-4">
                                                <label for="image" class="text-md-end">{{ __('Photo') }}</label>

                                                <input id="image" type="file"
                                                    class="form-control @error('image') is-invalid @enderror"
                                                    name="image" value="{{ old('image') }}" required
                                                    autocomplete="image">

                                                @error('image')
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
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="description" class="text-md-end">{{ __('Description') }}</label>

                                        <input id="description" type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}" required
                                            autocomplete="description">

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frame>
