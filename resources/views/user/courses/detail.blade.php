<x-layout>

    {{-- <div style=" width: 100%;" class="contianer mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 ps-5">
                <img class="trainer-img" src="/uploads/{{ $course->image }}" alt="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="trainer-name">
                    {{ $course->name }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                @if (auth()->check())
                    @if (auth()->user()->id == $course->trainer_id)
                        <p>You are the trainer of this course.</p>

                        //@elseif ($course->members->pluck('id')->contains(auth()->user()->id)) 
                @elseif ($members->contains('member_id', auth()->user()->id))
                        <p>You are already a member of this course.</p>
                    @elseif ($course->avail == 0)
                    <p>Full Members</p>
                @else
                    <form action="/courses/{{ $course->id }}/join" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Join Now</button>
                    </form>
                @endif
            @else
                <p>Please log in to join this course.</p>
                @endif
            </div>
        </div>
    </div> --}}

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="card py-5">
            <div class="container mb-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="container d-flex justify-content-center flex-column mt-4">
                            <div class="product-img-box ">
                                <img style="width: 100%;  min-height: 387px; max-height: 387px; object-fit: cover;
                                 object-position: center;"
                                    src="/uploads/{{ $course->image }}" alt="">
                            </div>
                            <div style="margin: 0; padding: 0;" class="container-fluid mt-3">
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
                                <div class="text-danger">Last Registration Date - {{ $course->start_date }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="container">
                        <div class="card p-4 mt-4">
                            <div class="card-title fs-3 mb-5">
                                REGISTRATION FORM
                            </div>
                            <form action="/courses/{{ $course->id }}/detail/sendmessage" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="">Message</label>
                                    <textarea style="resize: none; max-height: 15vh; min-height: 15vh;" name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                                    @error('message')
                                        <p class="text-danger text-sm ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-dark py-2 px-4 fw-semibold">REGISTER</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layout>
