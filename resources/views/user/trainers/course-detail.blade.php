<x-layout>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="card py-5">
            <div class="container mb-3">
                
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4">
                        <div class="container d-flex justify-content-center flex-column mt-4">
                            <div class="product-img-box ">
                                <img style="width: 100%;  max-height: 450px; min-height: 350px; object-fit: cover;
                                 object-position: center;"
                                    src="/uploads/{{ $course->image }}" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="container-fluid mt-3">
                            <div class="card-title fs-3 mb-3">
                                {{ Str::upper($course->name) }}
                            </div>
                            <div style="color: rgb(109, 105, 105);" class="d-flex mb-4">
                                <div class="d-flex me-3">
                                    <i style="padding-top: 2px; font-size: 18px;"
                                        class="fa-solid fa-user-secret me-1"></i>
                                    <a href="/trainers/{{ $course->trainer->id }}/detail" style="font-size: 18px;">{{ Str::upper($course->trainer->name) }} </a>
                                </div>
                                <div class="d-flex me-3">
                                    <i style="padding-top: 2px; font-size: 18px;"
                                        class="fa-solid fa-sack-dollar me-1"></i>
                                    <span style="font-size: 18px;">{{ Str::upper($course->price) }}$ </span>
                                </div>
                            </div>
                            <p style=" text-align: justify;" class="">{{ $course->description }}</p>
                            <div>
                                <a href="/trainer/courses/{{ $course->id }}/edit" class="btn btn-primary me-4 px-5">Edit</a>
                                <a href="/trainer/courses/{{ $course->id }}/detail/messages" class="btn btn-primary position-relative">
                                    SEE MESSAGES
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                      {{ $messages->count() }}
                                      <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row mt-5 ps-1 {{ $course->pending_status == 1 ? 'd-none' : '' }}">

                                <div class="col-lg-12 ">
                                    <div class="d-flex">
                                        <div style="padding-top: 2px;" class="me-3">
                                            Available Status
                                        </div>
                                        <div class="switch-container mt-1">
                                            <form id="statusForm"
                                                action="/trainer/courses/{{ $course->id }}/detail/changestatus"
                                                method="post">
                                                @csrf
                                                <input {{ $course->status == 1 ? 'checked' : '' }}
                                                    name="status" class="fs-1" type="checkbox"
                                                    id="mySwitch">
                                                <label for="mySwitch" class="switch"></label>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @if ($course->status == 0)
                                    <div style="padding-top: 1px;" class="col-lg-12">
                                        <div class="d-flex text-danger">
                                            <i class="fa-solid fa-circle-info pt-1 pe-1"></i>
                                            <div style="font-size: 13px; padding-top: 2px;" class="">If
                                                you turn off status, user can't search and see this course !</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#mySwitch').change(function() {
                $('#statusForm').submit();
            });
        });
    </script>


   



</x-layout>
