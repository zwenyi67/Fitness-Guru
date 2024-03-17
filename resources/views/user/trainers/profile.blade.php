<x-layout>




    <div class="container mt-5">
        <div class="row {{ auth()->user()->pending_status == 1 ? 'd-none' : '' }}">
            <div class="col-lg-12">
                <div class="container">
                    <div class="alert alert-warning p-3 d-flex justify-content-center">
                        <div style="text-align: justify;">
                            <strong>Attention:</strong> Your trainer account is pending admin approval.
                            Until then, some features may be restricted. If it has been a long time, you can contact <a
                                href="">admin@gmail.com </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mt-4 d-md-block ">
                            <div class="card p-3 py-4">
                                <div class="div">
                                    <div class="d-flex justify-content-center">
                                        <img style="border-radius: 50%; width: 100%; height: 100%; max-width: 150px; 
                                        min-width: 150px; max-height: 150px; min-height: 150px; object-fit: cover; object-position: center;
                                        "
                                            class="me-3" src="{{ asset('storage/uploads/' . $trainer->image) }}"
                                            alt="">


                                    </div>
                                    <form enctype="multipart/form-data"
                                        action="/trainer/{{ $trainer->id }}/profile/changeimage" method="post"
                                        class="input-group mt-3">
                                        @csrf
                                        <input name="image" type="file" class="form-control">
                                        <button type="submit" class="btn btn-dark">Change</button>
                                    </form>

                                    <div style="padding-top: 34px;" class="">
                                        <div class="d-flex">
                                            <div class="fs-3 fw-medium me-auto">{{ Str::upper($trainer->first_name) }}
                                                {{ Str::upper($trainer->last_name) }}
                                            </div>
                                            @if ($trainer->gender == 1)
                                                <i style="padding-top: 10px; color: rgb(100, 188, 235);"
                                                    class="fa-solid fa-mars fs-4"></i>
                                            @else
                                                <i style="padding-top: 10px; color: rgb(238, 141, 158);"
                                                    class="fa-solid fa-venus fs-4"></i>
                                            @endif

                                        </div>
                                        <div class="fw-medium">{{ Str::upper($trainer->sport->type) }}</div>
                                    </div>
                                    <hr>
                                    <div class="mt-2 py-1 px-1">
                                        <div class="mb-2 fs-5 fw-medium d-flex">
                                            <div>DESCRIPTION</div>
                                            <a class="ms-auto collapsible-button" href="#"
                                                onclick="toggleContent()"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                        </div>
                                        <div class="">
                                            <div class="content text-secondary">
                                                {{ $trainer->description == null ? 'There is no description yet' : $trainer->description }}
                                            </div>
                                            <form action="/trainer/{{ $trainer->id }}/profile/changedesc"
                                                method="post" class="collapsible d-none">
                                                @csrf
                                                <textarea name="description" style="resize: none; max-height: 170px; min-height: 170px;" class="form-control">{{ $trainer->description }}</textarea>
                                                <button type="submit" class="btn btn-dark mt-3 reviewUpdate"
                                                    data-id="{{ $trainer->id }}">Update</button>
                                            </form>
                                        </div>
                                    </div>






                                    <div class="row mt-5 ps-1 {{ $trainer->pending_status == 0 ? 'd-none' : '' }}">

                                        <div class="col-lg-12 ">
                                            <div class="d-flex">
                                                <div style="padding-top: 2px;" class="me-3">
                                                    Available Status
                                                </div>
                                                <div class="switch-container mt-1">
                                                    <form id="statusForm"
                                                        action="/trainer/{{ $trainer->id }}/profile/changestatus"
                                                        method="post">
                                                        @csrf
                                                        <input {{ $trainer->available_status == 1 ? 'checked' : '' }}
                                                            name="status" class="fs-1" type="checkbox"
                                                            id="mySwitch">
                                                        <label for="mySwitch" class="switch"></label>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($trainer->available_status == 0)
                                            <div style="padding-top: 1px;" class="col-lg-12">
                                                <div class="d-flex text-danger">
                                                    <i class="fa-solid fa-circle-info pt-1 pe-1"></i>
                                                    <div style="font-size: 13px; padding-top: 2px;" class="">If
                                                        you turn off status, user can't see you !</div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="card p-2 py-4 mt-5">
                                <div style="background: none;" class="card-header fw-semibold">
                                    <i class="fa-solid fa-star"></i> SOCIAL MEDIA LINK
                                </div>
                                <div class="card-body">
                                    <!-- Warning message -->
                                    @if ($trainer->facebook == null || $trainer->instagram == null)
                                        <div class="mb-4" style="color: rgb(224, 72, 72); font-weight: 500;">
                                            ⚠️ Fill out social media info!
                                        </div>
                                    @endif

                                        <div class="mb-4">
                                            <div class="d-flex">
                                                <a target="_blank" class="me-2">
                                                    <i
                                                        class="fa-brands fa-square-facebook 
                                                    @if ($trainer->facebook == null) fa-bounce @endif
                                                    fs-3 mb-2"></i></a>
                                                <div style="font-size: 12px;" class="pt-2 text-primary">Paste your
                                                    profile link</div>
                                            </div>
                                            <form action="/trainer/{{ $trainer->id }}/profile/changefacebook"
                                                method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <input style="font-size: 11px;" class="form-control" type="text"
                                                        name="facebook"
                                                        value="{{ $trainer->facebook != null ? $trainer->facebook : '' }}"
                                                        placeholder="Paste your profile link">
                                                    <button type="submit" class="btn btn-dark" title="Update"><i
                                                            class="fa-solid fa-pen-to-square"></i></button>
                                                </div>
                                                <div class="row ps-2">
                                                @error('facebook')
                                                        <p style="font-size: 12px;" class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </form>
                                        </div>
                                        <div class="mb-4">
                                            <div class="d-flex">
                                                <a target="_blank" class="me-2">
                                                    <i style=""
                                                        class="fa-brands fa-instagram 
                                                        @if ($trainer->instagram == null) fa-bounce @endif
                                                        fs-3 mb-2 text-danger"></i>
                                                </a>
                                                <div style="font-size: 12px;" class="pt-2 text-primary">Paste your
                                                    profile link</div>
                                            </div>
                                            <form action="/trainer/{{ $trainer->id }}/profile/changeinstagram"
                                                method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <input style="font-size: 11px;" class="form-control" type="text"
                                                    name="instagram"
                                                    value="{{ $trainer->instagram != null ? $trainer->instagram : '' }}"
                                                    placeholder="Paste your profile link">
                                                    <button type="submit" class="btn btn-dark" title="Update"><i
                                                            class="fa-solid fa-pen-to-square"></i></button>
                                                </div>
                                            </form>
                                        </div>

                                </div>
                            </div>
                            <div class="card p-2 py-4 mt-5">
                                <div style="background: none;" class="card-header fw-semibold">
                                    <i class="fa-solid fa-gear"></i> SETTING & PRIVACY
                                </div>
                                <div class="mt-4 ps-2">
                                    <div class="mb-4">
                                        <a href="/trainer/{{ $trainer->id }}/profile/changeemail" class="">
                                            CHANGE EMAIL
                                        </a>

                                    </div>
                                    <div class="mb-4">
                                        <a class="mb-3"
                                            href="/trainer/{{ $trainer->id }}/profile/changepassword">CHANGE
                                            PASSWORD</a>
                                    </div>
                                    <div class="mb-4">
                                        <a class="mb-3 " href="">LOGOUT</a>
                                    </div>
                                    <div class="mb-4">
                                        <a href="" class="mb-3 text-danger accountDelete"
                                            data-id="{{ $trainer->id }}">DELETE ACCOUNT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mt-4 mb-5 profile" style="overflow-y: visible;">
                            <div class="card p-2 py-4">
                                <form action="/trainer/{{ $trainer->id }}/profile/changedetail" method="post">
                                    @csrf
                                    <div class="container-fluid mb-3">
                                        <div class="row">
                                            <div style="background: none;" class="card-header mb-4 fw-semibold">
                                                PERSONAL INFORMATION
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">First Name</label>
                                                    <input style="font-size: 14px;" type="text" name="first_name"
                                                        id="name" class="form-control"
                                                        value="{{ $trainer->first_name }}">
                                                    @error('first_name')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Last Name</label>
                                                    <input style="font-size: 14px;" type="text" name="last_name"
                                                        id="name" class="form-control"
                                                        value="{{ $trainer->last_name }}">
                                                    @error('last_name')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Date of Birth</label>
                                                    <input style="font-size: 14px;" type="date" name="birth_date"
                                                        id="birth_date" class="form-control"
                                                        value="{{ $trainer->birth_date }}">
                                                    @error('birth_date')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Gender</label>
                                                    <select style="font-size: 14px;" class="form-select form-control"
                                                        name="gender" id="specialization">
                                                        <option value={{ $trainer->gender }} selected>
                                                            {{ $trainer->gender == 2 ? 'Female' : 'Male' }}</option>
                                                        @if ($trainer->gender == 2)
                                                            <option value=1>
                                                                Male
                                                            </option>
                                                        @else
                                                            <option value=2>
                                                                Female
                                                            </option>
                                                        @endif
                                                    </select>
                                                    @error('gender')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Height (CM)</label>
                                                    <input style="font-size: 14px;" type="text" name="height"
                                                        id="height" class="form-control"
                                                        value="{{ $trainer->height }}">
                                                    @error('height')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Weight (KG)</label>
                                                    <input style="font-size: 14px;" type="text" name="weight"
                                                        id="weight" class="form-control"
                                                        value="{{ $trainer->weight }}">
                                                    @error('weight')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Phone</label>
                                                    <input style="font-size: 14px;" type="text" name="phone"
                                                        id="phone" class="form-control"
                                                        value="{{ $trainer->phone }}">
                                                    @error('phone')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Region</label>
                                                        <select style="font-size: 14px;" class="form-select form-control"
                                                        name="region" id="region">
                                                        <option value={{ $trainer->region->id }} selected>
                                                            {{ ucwords($trainer->region->name) }}</option>
                                                        @foreach ($regions as $region)
                                                            <option value="{{ $region->id }}"
                                                                {{ old('region') == $region->id ? 'selected' : '' }}>
                                                                {{ ucwords($region->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('region')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Township</label>
                                                    <input style="font-size: 14px;" type="text" name="township"
                                                        class="form-control" value="{{ $trainer->township }}">
                                                    @error('township')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Address</label>
                                                    <input style="font-size: 14px;" type="text" name="address"
                                                        id="address" class="form-control"
                                                        value="{{ $trainer->address }}">
                                                    @error('address')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Specialization</label>
                                                    <select style="font-size: 14px;" class="form-select form-control"
                                                        name="specialization" id="specialization">
                                                        <option value={{ $trainer->sport->id }} selected>
                                                            {{ ucwords($trainer->sport->type) }}</option>
                                                        @foreach ($sports as $sport)
                                                            <option value="{{ $sport->id }}"
                                                                {{ old('specialization') == $sport->id ? 'selected' : '' }}>
                                                                {{ ucwords($sport->type) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('specialization')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Experience (YEAR)</label>
                                                    <input style="font-size: 14px;" type="text" name="experience"
                                                        id="experience" class="form-control"
                                                        value="{{ $trainer->experience }}">
                                                    @error('experience')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Hourly_Rate</label>
                                                    <input style="font-size: 14px;" type="text" name="hourly_rate"
                                                        class="form-control" value="{{ $trainer->hourly_rate }}">
                                                    @error('hourly_rate')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label style="font-size: 13px;" class="pb-1 fw-medium"
                                                        for="">Currently Working Gym</label>
                                                    <input style="font-size: 14px;" type="text" name="current_gym"
                                                        class="form-control" value="{{ $trainer->current_gym }}">
                                                    @error('current_gym')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div>
                                                <button id="update"
                                                    class="btn btn-dark fw-semibold px-3">UPDATE</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="card p-2 py-4 mt-5 mb-5">
                                <div style="background: none;" class="card-header mb-4 fw-semibold">
                                    BODY PHOTOS
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @if (json_decode($trainer->body_image) != null)

                                            @foreach (json_decode($trainer->body_image) as $image)
                                                <div class="col-lg-6 mt-3 mb-3">
                                                    <div style="width: 100%; height: 100%;">
                                                        <img style="width: 100%; height: 100%; max-height: 450px; min-height: 400px; object-fit: cover; object-position: center;"
                                                            src="/storage/uploads/{{ $image }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            There is no photo here !
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 py-4 mt-5 mb-5">
                                <div style="background: none;" class="card-header mb-4 fw-semibold">
                                    CERTIFICATION IMAGES
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @if (json_decode($trainer->certification) != null)

                                            @foreach (json_decode($trainer->certification) as $image)
                                                <div class="col-lg-4 mt-3 mb-3">
                                                    <div
                                                        style="width: 100%; height: 100%; border: 1px solid rgb(216, 216, 234); ">
                                                        <img style="width: 100%; height: 100%; object-fit: cover; object-position: center;"
                                                            src="/storage/uploads/{{ $image }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            There is no photo here !
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 py-4 mt-5 mb-2">
                                <div style="background: none;" class="card-header mb-4 fw-semibold">
                                    COURSES
                                </div>
                                <div class="row mb-2 px-3">
                                    @if ($courses->count() > 0)

                                        @foreach ($courses as $course)
                                            <div class="col-lg-6 mb-2 mt-3">

                                                <div style="border: none;" class="card">
                                                    <a href="/courses/{{ $course->id }}/detail"
                                                        style="max-height: 280px; overflow: hidden;">
                                                        <img style="max-height: 280px; object-fit: cover; object-position: center;"
                                                            src="/uploads/{{ $course->image }}" class="card-img-top"
                                                            alt="...">
                                                    </a>
                                                    <div class="">
                                                        <h5 class="card-title mb-2 mt-4 fs-3">{{ $course->name }}</h5>
                                                        <div style="color: rgb(109, 105, 105);" class="d-flex mb-2">
                                                            <div class="d-flex me-3">
                                                                <i style="padding-top: 2px; font-size: 15px;"
                                                                    class="fa-solid fa-user-secret me-1"></i>
                                                                <a href="/trainers/{{ $course->trainer->id }}/detail"
                                                                    style="font-size: 15px;">{{ Str::upper($course->trainer->name) }}
                                                                </a>
                                                            </div>
                                                            <div class="d-flex me-3">
                                                                <i style="padding-top: 2px; font-size: 15px;"
                                                                    class="fa-solid fa-sack-dollar me-1"></i>
                                                                <span
                                                                    style="font-size: 15px;">{{ Str::upper($course->price) }}$
                                                                </span>
                                                            </div>
                                                            <div class="d-flex me-3">
                                                                <i style="padding-top: 2px; font-size: 15px;"
                                                                    class="fa-solid fa-hourglass-half me-1"></i>
                                                                <span
                                                                    style="font-size: 15px;">{{ Str::upper($course->avail) }}
                                                                    members </span>
                                                            </div>
                                                        </div>
                                                        <p style="height: 54px;" class="">
                                                            {{ Str::words($course->description, 15) }}</p>



                                                        <a href="/courses/{{ $course->id }}/detail"
                                                            class="">JOIN</a>
                                                    </div>
                                                </div>
                                                <hr>

                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex justify-content-center fs-5 text-danger">
                                            You have not launched any course yet !
                                        </div>
                                    @endif

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <script>
        function toggleContent() {

            const collapsible = document.querySelector('.collapsible');

            const content = document.querySelector('.content');
            //collapsible.classList.toggle('active');
            content.style.display = content.style.display === 'none' ? 'block' : 'none';
            if (collapsible.classList.contains('d-none')) {
                // Remove 'd-none' class
                collapsible.classList.remove('d-none');
            } else {
                collapsible.classList.add('d-none');
            }
        }

        $(document).on('click', '.accountDelete', function(a) {
            a.preventDefault();
            var id = $(this).data('id');


            Swal.fire({
                title: 'Are you sure you want to delete your account?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/trainer/' + id + '/profile/delete',
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success',
                                }).then(() => {
                                    window.location.href = '/';
                                });
                            } else {
                                // Handle other scenarios or errors
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Unable to delete your account.',
                                    icon: 'error',
                                });
                            }
                        }
                    });
                }
            });
        });


        $(document).ready(function() {
            $('#mySwitch').change(function() {
                $('#statusForm').submit();
            });
        });
    </script>


</x-layout>
