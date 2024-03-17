<x-admin-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card py-2">
                <div class="card-header d-flex">
                    <a href="#" onclick="history.back()">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Detail</h3>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-4 mt-5">
                                <div class="d-flex justify-content-center">
                                    <img style="max-width: 300px; min-width: 300px; max-height: 300px; min-height: 300px;
                                width: 100%; height: 100%; 
                                object-fit: cover; object-position: center;
                                border-radius: 50%;"
                                        class="" src="/storage/uploads/{{ $trainer->image }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-center" >
                                <div style="align-items: end" class="d-flex justify-content-center pt-3 pb-3">
                                <a style="font-size: 20px;" class="btn btn-primary  font-weight-bold p-2 px-3" href="/downloadcv/{{ $trainer->cv_form }}">Download CV Form</a>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-11 mt-5 ">
                                <div class="">
                                    <div class="card ">
                                        <h4 class="card-header fw-semibold">
                                            Personal Infromation
                                        </h4>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">First Name</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Last Name</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->last_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class="text-md-end">Date of Birth</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->birth_date }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Gender</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->gender == 1 ? 'Male' : 'Female' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Height</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->height }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Weight</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->weight }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name"
                                                            class=" text-md-end">Specialization</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->sport->type }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Experience</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->experience }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Hourly Rate</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->hourly_rate }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Current Working
                                                            Gym</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->current_gym == null ? '-' : $trainer->current_gym }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-11 mt-5 ">
                                <div class="">
                                    <div class="card ">
                                        <h4 class="card-header fw-semibold">
                                            Contact Infromation
                                        </h4>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Email</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Phone</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class="text-md-end">Region</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->region->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Township</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->township }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="name" class=" text-md-end">Address</label>
                                                        <input disabled class="form-control"
                                                            value="{{ $trainer->address }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-11 mt-5">
                                <div class="card">
                                    <h4 class="card-header">
                                        Description
                                    </h4>
                                    <div class="card-body">
                                        <div style="text-align: justify;" class="text-break fs-5">
                                            <div style="border: 1px solid #e9ecef; border-radius: 5px; background: #e9ecef;"
                                                class="p-2 py-3 px-3">
                                                {{ $trainer->description == null ? ' - ' : $trainer->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-11 mt-5">
                                <div class="card">
                                    <h4 class="card-header">
                                        Body Photo
                                    </h4>
                                    <div class="card-body">
                                        <div class="row">
                                            @if((json_decode($trainer->body_image)) != null)
                                                
                                            @foreach (json_decode($trainer->body_image) as $image)
                                                <div class="col-lg-6 mt-3 mb-3">
                                                    <div style="width: 100%; height: 100%;">
                                                        <img style="width: 100%; height: 100%; max-height: 550px; min-height: 450px; object-fit: cover; object-position: center;"
                                                            src="/storage/uploads/{{ $image }}" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                            @else 
                                            There is no photo here !
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-11 mt-5">
                                <div class="card">
                                    <h4 class="card-header">
                                        Certification Image
                                    </h4>
                                    <div class="card-body">
                                        <div class="row">
                                            @if((json_decode($trainer->certification)) != null)
                                                
                                            @foreach (json_decode($trainer->certification) as $image)
                                                <div class="col-lg-4 mt-3 mb-3">
                                                    <div style="width: 100%; height: 100%; border: 1px solid rgb(216, 216, 234); ">
                                                        <img style="width: 100%; height: 100%; object-fit: cover; object-position: center;"
                                                            src="/storage/uploads/{{ $image }}" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                            @else 
                                            There is no photo here !
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->



</x-admin-layout>
