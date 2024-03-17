<x-layout>



    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="card py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center mt-4">
                        <div>
                            <div style="width: 100%; max-width: 500px;" class="d-flex justify-content-center">
                                <img style="max-width: 300px; min-width: 300px; max-height: 300px; min-height: 300px;
                            width: 100%; height: 100%; 
                            object-fit: cover; object-position: center;
                            border-radius: 50%;"
                                    src="/storage/uploads/{{ $trainer->image }}" alt="">
                            </div>
                            <div class="fs-2 fw-medium mt-3 d-flex justify-content-center">
                                Hello I'm {{ Str::upper($trainer->name) }}
                            </div>
                            <div class="fs-5 fw-normal d-flex mt-2 justify-content-center">
                                <i class="fa-solid fa-dumbbell pt-1 me-2"></i>   {{ Str::upper($trainer->sport->type) }} &nbsp; | &nbsp;&nbsp; <i class="fa-regular fa-clock pt-1 me-2"></i> {{ $trainer->experience }} Years
                                Experience
                            </div>
                            <div class="fs-5 fw-normal d-flex mt-2 justify-content-center">
                                @if ($trainer->courses->count() > 0)
                                <i class="fa-solid fa-arrow-trend-up pt-1 me-2"></i>
                                {{ $trainer->courses->count() }}
                                courses &nbsp; | 
                            @endif  &nbsp;&nbsp; <i class="fa-solid fa-money-check-dollar pt-1 me-2"></i>
                            {{ $trainer->hourly_rate }} Hourly Rate
                            </div>

                            <div class="d-flex justify-content-center mt-3 mb-3">

                                <div class="d-flex pt-1 me-3 fs-5">
                                    @php
                                        $start = 1;
                                        $allReview = 0;
                                        $reviewCount = $reviews->count();

                                        foreach ($reviews as $review) {
                                            $allReview += $review->rating;
                                        }

                                        $avgReview = $reviewCount > 0 ? ($allReview * 1.0) / $reviewCount : 0;
                                        $avg = round($avgReview);
                                    @endphp

                                    @while ($start <= 5)
                                        @if ($avg >= $start)
                                            <i class="fa-solid fa-star rating-star"></i>
                                        @else
                                            <i class="fa-regular fa-star rating-star"></i>
                                        @endif
                                        @php
                                            $start++;
                                        @endphp
                                    @endwhile

                                </div>

                                <div class="d-flex me-3 fs-5">
                                    <a href="#review"><?php if ($trainer->trainerReviews->count() == 0) {
                                        echo 0;
                                    } else {
                                        echo $trainer->trainerReviews->count();
                                    }
                                    ?> Rating{{ $trainer->trainerReviews->count() > 1 ? 's' : '' }} </a>
                                </div>
                            </div>
                            
                            <div class="mt-3 d-flex justify-content-center">
                                <div class="d-flex">
                                    <a target="_blank" class="social-btn me-1" href="tel:{{ $trainer->phone }}"><i
                                            class="fa-solid fa-phone  fs-5"></i></a>
                                    <a target="_blank" class="social-btn me-1" href="mailto:{{ $trainer->email }}"><i
                                            class="fa-sharp fa-solid fa-envelope  fs-5"></i></i></a>
                                    <a target="_blank" class="social-btn me-1" href="{{ $trainer->facebook }}"><i
                                            class="fa-brands fa-square-facebook fs-5"></i></a>
                                    <a target="_blank" class="social-btn me-1" href="{{ $trainer->instagram }}"><i
                                            class="fa-brands fa-instagram  fs-5"></i></a>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center mt-4 px-4">
                        <div style="width: 100%;" class="card rounded shadow py-4">
                            <div class="card-body">
                                <div class="fs-5 mb-4 ps-3 fw-medium">
                                    SEND MESSAGE TO {{ strtoupper($trainer->name) }}
                                </div>
                                <form method="post" action="/trainers/{{ $trainer->id }}/detail/sendmessage" class="px-2" id="message">
                                    @csrf

                                    <div class="mb-4">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter Your Name" value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Enter Your Email" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Enter Your Phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <textarea style="resize: none; max-height: 15vh; min-height: 15vh;" name="message" id="message"
                                            placeholder="Send Message" class="form-control">{{ old('message') }}</textarea>
                                        @error('message')
                                            <p class="text-danger text-sm ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="d-flex py-1">
                                        <button type="submit"
                                            class="checkout py-2 px-5 ms-2 sendMessage fs-semibold"
                                            data-id="{{ $trainer->id }}">SEND</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="card">
            <h4 style="background: #dee0e2;" class="card-header  ps-4 py-3">
                CERTIFICATION IMAGES
            </h4>
            <div class="card-body px-4">
                <div class="row">
                    @if (json_decode($trainer->certification) != null)

                        @foreach (json_decode($trainer->certification) as $image)
                            <div class="col-lg-4 col-md-6 mt-3 mb-3">
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

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mt-3 mb-2">
                <div class="card ">
                    <h4 style="background: #dee0e2;" class="card-header py-3 ps-4">
                        PERSOANL DETAIL INFORMATION
                    </h4>
                    <div class="card-body px-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">First Name</label>
                                    <input disabled class="form-control" value="{{ $trainer->first_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Last Name</label>
                                    <input disabled class="form-control" value="{{ $trainer->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class="text-md-end">Date of Birth</label>
                                    <input disabled class="form-control" value="{{ $trainer->birth_date }}">
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
                                    <input disabled class="form-control" value="{{ $trainer->height }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Weight</label>
                                    <input disabled class="form-control" value="{{ $trainer->weight }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Specialization</label>
                                    <input disabled class="form-control" value="{{ $trainer->sport->type }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Experience</label>
                                    <input disabled class="form-control" value="{{ $trainer->experience }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Hourly Rate</label>
                                    <input disabled class="form-control" value="{{ $trainer->hourly_rate }}">
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
            <div class="col-lg-6 mt-3 mb-2">
                <div class="card ">
                    <h4 style="background: #dee0e2;" class="card-header ps-4 py-3">
                        CONTACT INFORMATION
                    </h4>
                    <div class="card-body px-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Email</label>
                                    <input disabled class="form-control" value="{{ $trainer->email }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Phone</label>
                                    <input disabled class="form-control" value="{{ $trainer->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class="text-md-end">Region</label>
                                    <input disabled class="form-control" value="{{ $trainer->region->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Township</label>
                                    <input disabled class="form-control" value="{{ $trainer->township }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class=" text-md-end">Address</label>
                                    <input disabled class="form-control" value="{{ $trainer->address }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">

    </div>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">

        <div class="card">
            <h4 style="background: #dee0e2;" class="card-header ps-4 py-3">
                DESCRIPTION
            </h4>
            <div class="card-body px-4">
                <div style="text-align: justify;" class="text-break fs-5">
                    <div style="border: 1px solid #e9ecef; border-radius: 5px;" class="p-2 py-3 px-3">
                        {{ $trainer->description == null ? ' - ' : $trainer->description }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">

        <div class="card">
            <h4 class="card-header py-3 ps-4">
                BODY PHOTOS
            </h4>
            <div class="card-body px-4">
                <div class="row">
                    @if (json_decode($trainer->body_image) != null)

                        @foreach (json_decode($trainer->body_image) as $image)
                            <div class="col-lg-4 col-md-6 mt-3 mb-3">
                                <div style="width: 100%; height: 100%;">
                                    <img style="width: 100%; height: 100%; max-height: 500px; min-height: 450px; object-fit: cover; object-position: center;"
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


    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="card pb-4">
            <h4 style="background: #dee0e2;" class="card-header py-3 ps-4">
                RATINGS & REVIEWS
            </h4>
            <div class="card-body">
                <div class="container mt-3 mb-5">
                    <div class="row">
                        <div class="col-lg-4 mt-4 mb-2">
                            <div class="container">
                                <div class="fs-1">
                                    {{ round($avgReview, 1) }}
                                </div>

                                <div class="d-flex pt-1 me-3 fs-4 mb-3">

                                    @php
                                        $start = 1;
                                        $allReview = 0;
                                        $reviewCount = $reviews->count();

                                        foreach ($reviews as $review) {
                                            $allReview += $review->rating;
                                        }

                                        $avgReview = $reviewCount > 0 ? ($allReview * 1.0) / $reviewCount : 0;
                                        $avg = round($avgReview);
                                    @endphp

                                    @while ($start <= 5)
                                        @if ($avg >= $start)
                                            <i class="fa-solid fa-star rating-star"></i>
                                        @else
                                            <i class="fa-regular fa-star rating-star"></i>
                                        @endif
                                        @php
                                            $start++;
                                        @endphp
                                    @endwhile

                                </div>
                                <div>
                                    <?php if ($trainer->trainerReviews->count() == 0) {
                                        echo 0;
                                    } else {
                                        echo $trainer->trainerReviews->count();
                                    }
                                    ?> ratings & reviews
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mt-4">
                            <div class="container d-flex mb-1">
                                <div class="me-3">
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                </div>
                                <div class="progress-bar me-3">
                                    <div class="progress-fill5"></div>
                                </div>
                                <div>
                                    {{ $five }}
                                </div>

                            </div>
                            <div class="container d-flex mb-1">
                                <div class="me-3">
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                </div>
                                <div class="progress-bar me-3">
                                    <div class="progress-fill4"></div>
                                </div>
                                <div>
                                    {{ $four }}
                                </div>
                            </div>
                            <div class="container d-flex mb-1">
                                <div class="me-3">
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                </div>
                                <div class="progress-bar me-3">
                                    <div class="progress-fill3"></div>
                                </div>
                                <div>
                                    {{ $three }}
                                </div>
                            </div>
                            <div class="container d-flex mb-1">
                                <div class="me-3">
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                </div>
                                <div class="progress-bar me-3">
                                    <div class="progress-fill2"></div>
                                </div>
                                <div>
                                    {{ $two }}
                                </div>
                            </div>
                            <div class="container d-flex mb-1">
                                <div class="me-3">
                                    <i class="fa-solid fa-star rating-stars"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                    <i class="fa-regular fa-star normal-star"></i>
                                </div>
                                <div class="progress-bar me-3">
                                    <div class="progress-fill1"></div>
                                </div>
                                <div>
                                    {{ $one }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container mt-3 mb-3">
                    <form id="review" action="/trainers/{{ $trainer->id }}/detail/review#review" method="POST">
                        @csrf
                        <div class="mb-1">
                            Your rating
                        </div>
                        <div class="rating-container" id="ratingContainer">

                            <div class="star" data-value="1">&#9733;</div>
                            <div class="star" data-value="2">&#9733;</div>
                            <div class="star" data-value="3">&#9733;</div>
                            <div class="star" data-value="4">&#9733;</div>
                            <div class="star" data-value="5">&#9733;</div>
                        </div>
                        @error('rating')
                            <p class="text-danger text-sm ">{{ $message }}</p>
                        @enderror

                        <input name="rating" type="hidden" id="userRating" value="">

                        <div class="d-flex mt-3 mb-2">
                            Your review
                        </div>

                        <div>
                            <textarea style="max-height: 130px; min-height: 130px;" placeholder="Write a review . . ." class="form-control"
                                name="review" id=""></textarea>
                            @error('review')
                                <p class="text-danger text-sm ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button class="checkout py-2 px-4">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <hr>
                @if ($reviews->count() == 0)
                    <div style="" class="container mt-5 mb-5 text-danger fs-5 d-flex justify-content-center">
                        There are no reviews in this trainer.
                    </div>
                @else
                    @include('user.trainers.review')
                @endif
            </div>
        </div>
    </div>



    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="card ">
            <div style="background: #dee0e2;" class="card-header fs-5  py-3">
                Courses & Programs
            </div>
            <div class="card-body">
                <div class="container mt-3">
                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="col-lg-4">

                                <div style="border: none;" class="card">
                                    <a href="/courses/{{ $course->id }}/detail"
                                        style="max-height: 280px; overflow: hidden;">
                                        <img style="max-height: 280px; min-height: 280px; object-fit: cover; object-position: center;"
                                            src="/uploads/{{ $course->image }}" class="card-img-top" alt="...">
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
                                                <span style="font-size: 15px;">{{ Str::upper($course->price) }}$
                                                </span>
                                            </div>
                                            <div class="d-flex me-3">
                                                <i style="padding-top: 2px; font-size: 15px;"
                                                    class="fa-solid fa-hourglass-half me-1"></i>
                                                <span style="font-size: 15px;">{{ Str::upper($course->avail) }}
                                                    members </span>
                                            </div>
                                        </div>
                                        <p style="height: 54px;" class="">
                                            {{ Str::words($course->description, 15) }}</p>
                                        <a href="/courses/{{ $course->id }}/detail" class="">JOIN</a>
                                    </div>
                                </div>
                                <hr>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toggleImageSize() {
            var largeImage = document.getElementById("large-box");

            if (largeImage.style.display === "none") {
                largeImage.style.display = "block";
            } else {
                largeImage.style.display = "none";
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const ratingContainer = document.getElementById('ratingContainer');
            const userRatingElement = document.getElementById('userRating');

            let selectedRating = null;

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.dataset.value;
                    selectedRating = rating;

                    // Set the clicked star and previous stars as active
                    highlightStars(selectedRating);

                    userRatingElement.value = selectedRating;

                });

                star.addEventListener('mouseover', function() {
                    const rating = this.dataset.value;

                    // Highlight stars up to the selected rating
                    highlightStars(rating);
                });

                star.addEventListener('mouseout', function() {
                    // Highlight stars up to the selected rating
                    highlightStars(selectedRating);
                });
            });

            function highlightStars(rating) {
                stars.forEach(star => {
                    const starRating = star.dataset.value;
                    star.classList.toggle('active', starRating <= rating);
                });
            }
        });

        $(document).on('click', '.reviewDelete', function(a) {
            a.preventDefault();
            var id = $(this).data('id');


            Swal.fire({
                title: 'Are you sure you want to delete this review?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/trainers/' + id + '/review/delete',
                        type: 'DELETE',
                        success: function(response) {
                            // Replace the content of #reviewSection with the updated reviews
                            $('#reviewSection').html(response.reviews);
                            Swal.fire(
                                'Deleted!',
                                'Review has been deleted.',
                                'info'
                            )
                        }
                    });
                }
            });
        });

        function toggleContent(id) {

            const collapsible = document.querySelector('.collapsible' + id);

            const content = document.querySelector('.content' + id);
            //collapsible.classList.toggle('active');
            content.style.display = content.style.display === 'none' ? 'block' : 'none';
            if (collapsible.classList.contains('d-none')) {
                // Remove 'd-none' class
                collapsible.classList.remove('d-none');
            } else {
                collapsible.classList.add('d-none');
            }
        }

        $(document).on('click', '.reviewUpdate', function(a) {
            a.preventDefault();
            var id = $(this).data('id');
            var formData = $('#updateReviewForm' + id).serialize(); // Serialize form data


            $.ajax({
                url: '/trainers/' + id + '/review/update',
                type: 'PATCH',
                data: formData,
                success: function(response) {
                    console.log(response);

                    $('#reviewSection').html(response.reviews);
                },
                error: function(error) {
                    console.error('Ajax error:', error);
                }
            });
        });

        
    </script>
</x-layout>
