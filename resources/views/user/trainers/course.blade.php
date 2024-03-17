<x-layout>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center">M Y &nbsp; C O U R S E S</h1>
            </div>
        </div>
    </div>

    <div style="padding: 20px;" class="container mt-4">
        <div class="card shadow px-3 py-4">
            <div class="container">
                <div class="mt-2 mb-5">
                    <a href="/trainer/courses/create" class="checkout px-5 py-3"> Launch New Course/Program</a>
                </div>
                <div class="row mt-3">
                    @if($courses->count() > 0 )
                    @foreach ($courses as $course)
                        <div class="col-lg-3 mb-5">

                            <div style="border: none;" class="card">
                                <a href="/trainer/courses/{{ $course->id }}/detail"
                                    style="max-height: 380px; overflow: hidden;">
                                    <img style="max-height: 230px; min-height: 230px; object-fit: cover; object-position: center;"
                                        src="/uploads/{{ $course->image }}" class="card-img-top image-fluid"
                                        alt="...">
                                    @if ($course->status == 0)
                                        <div class="card-img-overlay p-0 pt-2 px-1 m-0">
                                            <div class="alert alert-danger form-control p-0 m-0 ">
                                                <div style="font-size: 12px; text-align: center;">
                                                    Course Status is off.
                                                </div>
                                                <div style="font-size: 11px; text-align: center;">
                                                    User can't see your course.
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </a>

                                <div class="">
                                    <div style="font-size: 18px;" class="mb-2 mt-3 fw-semibold">{{ $course->name }}
                                    </div>
                                    <div style="color: rgb(109, 105, 105);" class="d-flex mb-1">
                                        <div class="d-flex me-2">
                                            <i style="padding-top: 2px; font-size: 14px;"
                                                class="fa-solid fa-user-secret me-1"></i>
                                            <a href="/trainers/{{ $course->trainer->id }}/detail"
                                                style="font-size: 14px;">{{ Str::upper($course->trainer->name) }} </a>
                                        </div> | &nbsp;
                                        <div class="d-flex me-3">
                                            <i style="padding-top: 3px; font-size: 14px;"
                                                class="fa-solid fa-award me-1"></i>
                                            <span style="font-size: 14px;"> {{ $course->topic->name }} </span>
                                        </div>
                                    </div>
                                    <div style="color: rgb(109, 105, 105);" class="d-flex mb-2">
                                        <div class="d-flex me-3 mb-2">
                                            <i style="padding-top: 2px; font-size: 14px;"
                                                class="fa-solid fa-sack-dollar me-1"></i>
                                            <span style="font-size: 15px;">{{ Str::upper($course->price) }}$ </span>
                                        </div> | &nbsp;
                                        <div class="d-flex me-3">
                                            <i style="padding-top: 3px; font-size: 14px;"
                                                class="fa-solid fa-globe me-1"></i>
                                            <span style="font-size: 14px;">
                                                {{ $course->method == 1 ? 'Online' : 'InClass' }} </span>
                                        </div>
                                    </div>

                                    <div style="max-height: 53px; min-height: 53px;" class="">
                                        {{ Str::words($course->description, 12) }}</div>

                                </div>
                            </div>
                            <hr>

                        </div>

                        
                    @endforeach
                    @else
                    <div class="text-danger fw-semibold fs-5 text-center mt-5 mb-5">
                        You haven't launced any course yet !
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-layout>
