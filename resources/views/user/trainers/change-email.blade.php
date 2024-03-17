<x-layout>


    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                <div class="card p-3">
                    <div style="background: none;" class="card-header fs-5 fw-semibold">
                        CHANGE EMAIL
                    </div>
                    <div class="warning-container py-4">
                        <span class="warning-icon">⚠️</span>
                        <strong>Warning:</strong> Changing your email address is a sensitive action with potential consequences.
                        <br><br>
                            <li class="pb-1">1. You will need to use the new email address for future logins.</li>
                            <li class="pb-1">2. Any communication from us, including account recovery information, will be sent to the new email.</li>
                            <li class="pb-1">3. Ensure that the new email is accessible and secure.</li>
                        <br>
                        If you initiated this change, please proceed carefully. If you did not request this change, contact our support immediately.
                        <br><br>
                        Proceed with caution and make sure you understand the implications of changing your email address.
                    </div>
                    <div class="card-body mb-3 mt-3">
                        <form action="/trainer/{{ auth()->user()->id }}/profile/changeemail" method="post">
                            @csrf
                            <div class="mb-4">
                                <label class="mb-2 ps-1" for="">Your Email</label>
                                <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                @error('email')
                                <p class="text-danger text-sm ">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">UPDATE</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </div>

</x-layout>
