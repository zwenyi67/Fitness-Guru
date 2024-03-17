<x-layout>


    <div class="container mt-5">
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
                                            class="me-3" src="/uploads/{{ $member->image }}" alt="">
                                        

                                    </div>
                                    <form enctype="multipart/form-data" action="/member/{{ $member->id }}/profile/changeimage" method="post" class="input-group mt-3">
                                        @csrf
                                        <input name="image" type="file" class="form-control">
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </form>

                                    <div style="padding-top: 34px;" class="">
                                        <div class="d-flex">
                                            <div class="fs-4 fw-semibold me-3">{{ Str::upper($member->first_name) }} {{ Str::upper($member->last_name) }}
                                            </div>
                                           
                                        </div>
                                        <div class="fw-medium">MEMBER</div>
                                    </div>
                                    
                                    

                                </div>
                            </div>
                            <div class="card p-2 py-4 mt-5">
                                <div style="background: none;" class="card-header fw-semibold">
                                    <i class="fa-solid fa-gear"></i> SETTING & PRIVACY
                                </div>
                                <div class="mt-4 ps-2">
                                    <div class="mb-4">
                                        <a href="/member/{{ $member->id }}/profile/changeemail" class="">
                                            CHANGE EMAIL
                                        </a>

                                        

                                    </div>
                                    <div class="mb-4">
                                        <a class="mb-3"
                                            href="/member/{{ $member->id }}/profile/changepassword">CHANGE
                                            PASSWORD</a>
                                    </div>
                                    <div class="mb-4">
                                        <a class="mb-3 " href="">LOGOUT</a>
                                    </div>
                                    <div class="mb-4">
                                        <a href="" class="mb-3 text-danger accountDelete" data-id="{{ $member->id }}">DELETE ACCOUNT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mt-4 mb-5 profile">
                            <div class="card p-2 py-4">
                                <form action="/member/{{ $member->id }}/profile/changedetail" method="post">
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
                                                        value="{{ $member->first_name }}">
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
                                                        value="{{ $member->last_name }}">
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
                                                        for="">Phone</label>
                                                    <input style="font-size: 14px;" type="text" name="phone"
                                                        id="phone" class="form-control"
                                                        value="{{ $member->phone }}">
                                                    @error('phone')
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
                                                        value="{{ $member->address }}">
                                                    @error('address')
                                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row mt-2">
                                            <div>
                                                <button id="update"
                                                    class="btn btn-primary fw-semibold px-3">UPDATE</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            {{-- <div class="card p-2 py-4 mt-5 mb-5">
                                <div style="background: none;" class="card-header mb-4 fw-semibold">
                                    BODY PHOTO
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-4 col-md-6 mt-3">
                                        <img class="body-img" src="/uploads/{{ $trainer->image }}" alt="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 mt-3">
                                        <img class="body-img" src="/uploads/{{ $trainer->image }}" alt="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 mt-3">
                                        <img class="body-img" src="/uploads/{{ $trainer->image }}" alt="">
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="card p-2 py-4 mt-5 mb-2">
                                <div style="background: none;" class="card-header mb-4 fw-semibold">
                                    COURSES
                                </div>
                                <div class="row mb-2 px-3">
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
                                </div>
                            </div> --}}

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
