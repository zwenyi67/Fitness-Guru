<x-layout>

    <div style="padding: 20px;" class="container mt-5">
        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                <div class="card p-3 px-3 py-4">
                    <div style="background: none; " class="card-header mb-4 fs-4 fw-semibold">
                        CHANGE PASSWORD
                    </div>
                    <div class="warning-container py-4 mb-5">
                        <span class="warning-icon">⚠️</span>
                        <strong>Warning:</strong> Changing your password is a sensitive action with potential consequences.
                        <br><br>
                            <li class="pb-1">1. You will need to use the new password for future logins.</li>
                            <li class="pb-1">2. Ensure that the new password is memorable but secure.</li>
                            <li class="pb-1">3. Keep your password confidential and do not share it with others.</li>
                        <br>
                        If you initiated this change, please proceed carefully. If you did not request this change, contact our support immediately.
                        <br><br>
                        Proceed with caution and make sure you understand the implications of changing your password.
                    </div>
                    <form class="px-3" action="/trainer/{{ auth()->user()->id }}/profile/changepassword" method="post">
                        @csrf
                    <div class="mb-4">
                        <label for="old_password" class="text-md-end">Old Password</label>

                        <input id="old_password" type="password"
                            class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                            required>

                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="text-md-end">New Password</label>

                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password-confirm" class="text-md-end">Confirm Password</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary px-4 fw-semibold">UPDATE</button>
                    </div>
                </form>
                </div>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </div>


</x-layout>
