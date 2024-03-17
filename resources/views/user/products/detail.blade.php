<x-layout>

    @include('user.products.layout')


    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5 ">
        <div class="card py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="container d-flex justify-content-center">
                            <div class="product-img-box">
                                <img style="width: 100%; max-width: 400px; min-width: 280px; min-height: 387px; max-height: 387px;
                                 object-position: center;"
                                    src="/uploads/{{ $product->image }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="container d-flex justify-content-center mt-2">
                            <div class="container">
                                <div class="fs-4 mb-3">
                                    {{ $product->name }}
                                </div>
                                <div class="d-flex mb-3">

                                    <div class="d-flex pt-1 me-3">
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

                                    <div class="d-flex me-3">
                                        <a href="#review"><?php if ($product->productReviews->count() == 0) {
                                            echo 0;
                                        } else {
                                            echo $product->productReviews->count();
                                        }
                                        ?> ratings & reviews </a>
                                    </div>
                                </div>
                                <div class="d-flex mb-1">
                                    <div style="color: rgb(148, 136, 136);" class="me-3 ms-1">BRAND : </div>
                                    {{ $product->brand }}
                                    <div style="color: rgb(148, 136, 136);" class="me-3 ms-4"> CATEGORY : </div>
                                    <a
                                        href="/products?category={{ $product->category->id }}">{{ $product->category->name }}</a>
                                </div>

                                <hr class="mt-2 mb-4">
                                <div style="color: #00274a" class="fs-4 mb-3">
                                    $ {{ $product->price }}
                                </div>

                                @php

                                    if (session()->has('cart')) {
                                        $cart = session()->get('cart', []);
                                    }

                                @endphp

                                @if (isset($cart[$product->id]['quantity']))

                                    @if ($cart[$product->id]['quantity'] < $product->total_qty)
                                        <div class="d-flex align-items-center mb-5">
                                            <div style="color: rgb(148, 136, 136);" class="me-3 ms-1">QUANTITY </div>
                                            <a class="border p-2 px-2 text-black ms-2" href="javascript:void(0);"
                                                onclick="changeQuantity(-1)"><i class="fa-solid fa-minus"></i></a>
                                            <div class="border p-2 px-3 quantity">1</div>
                                            <a class="border p-2 px-2 text-black me-3" href="javascript:void(0);"
                                                onclick="changeQuantity(1)"><i class="fa-solid fa-plus"></i></a>
                                            <div style="color: rgb(148, 136, 136);">
                                                {{ $product->total_qty }} items left
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-danger">This product has already been added to the cart.</div>
                                    @endif
                                @else
                                    <div class="d-flex align-items-center mb-5">
                                        <div style="color: rgb(148, 136, 136);" class="me-3 ms-1">QUANTITY </div>
                                        <a class="border p-2 px-2 text-black ms-2" href="javascript:void(0);"
                                            onclick="changeQuantity(-1)"><i class="fa-solid fa-minus"></i></a>
                                        <div class="border p-2 px-3 quantity">1</div>
                                        <a class="border p-2 px-2 text-black me-3" href="javascript:void(0);"
                                            onclick="changeQuantity(1)"><i class="fa-solid fa-plus"></i></a>
                                        <div style="color: rgb(148, 136, 136);">
                                            {{ $product->total_qty }} items left
                                        </div>
                                    </div>

                                @endif

                                @if(auth()->check())

                                <div class="d-flex">
                                    <a href="" class="checkout px-5 py-2 add" data-id="{{ $product->id }}">ADD
                                        TO CART</a>
                                </div>
                                @else
                                <div class="fw-semibold text-danger">
                                    To Buy Products, Please Login First !
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-4">
        <div class="card ">
            <div style="background: #dee0e2;" class="card-header fs-5">
                Product description and details of {{ $product->name }}
            </div>
            <div class="card-body">
                <div style="padding-left: 20px; padding-right: 30px; text-align: justify;">
                    <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate, ab quo?
                        Ullam, dolore saepe expedita nobis reiciendis provident aliquam unde repellendus blanditiis
                        nihil sint quibusdam sapiente, at, reprehenderit ducimus tempore? Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Rem quam sed dolor, eius eaque suscipit voluptates perferendis non
                        quidem est, quo cumque labore fugit aliquid ipsam autem quisquam deserunt libero.</p>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-4">
        <div class="card ">
            <div style="background: #dee0e2;" class="card-header fs-5">
                Ratings & Reviews
            </div>

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
                                    <?php if ($product->productReviews->count() == 0) {
                                        echo 0;
                                    } else {
                                        echo $product->productReviews->count();
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
                <div class="container mt-5 mb-5">
                    <form id="review" action="/products/{{ $product->id }}/detail/review#review" method="POST">
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
                        There are no reviews in this product.
                    </div>
                @else
                    @include('user.products.review')
                @endif
            </div>
        </div>
    </div>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-4">
        <div class="card ">
            <div style="background: #dee0e2;" class="card-header fs-5">
               You may also like this products
            </div>
            <div class="card-body">
                <div style=" text-align: justify;">
                    <div class="row">
                        @foreach ($suggests as $suggest)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mb-3">
                        <div class="image-container">
                            <img src="/uploads/{{ $suggest->image }}" class="card-img-top" alt="">
                            <div class="overlay">
                                <a href="" class="button addToCart" title="Add to cart"
                                    data-id="{{ $suggest->id }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                @if (auth()->check())
                                    
                                @if(auth()->user()->wishlists->contains('product_id', $suggest->id)) 
                                <a href="" class="button removeWish text-danger" title="Wishlist" data-id="{{ $suggest->id }}">
                                    <i class="fa-solid fa-heart text-danger"></i>
                                </a>
                                @else
                                <a href="" class="button wish" title="Wishlist" data-id="{{ $suggest->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                @endif
                                @else
                                <a href="#" class="button" title="Wishlist" data-id="{{ $suggest->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                @endif
                               

                                <a href="/products/{{ $suggest->id }}/detail" class="button" title="Details">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h5 class="card-title">{{ $suggest->name }}</h5>
                            <div class="d-flex pt-1 me-3 fs-5 mb-3">

                                @php
                                    $start = 1;
                                    $allReview = 0;
                                    $reviewCount = $suggest->productReviews->count();

                                    foreach ($suggest->productReviews as $review) {
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
                            <p class="card-text"><small class="text-body-secondary">$ {{ $suggest->price }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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




        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                location.reload();
            }
        });

        var maxAllowedQuantity = @php
            if (session()->has('cart')) {
                $cart = session()->get('cart', []);
                echo isset($cart[$product->id]['quantity']) ? $product->total_qty - $cart[$product->id]['quantity'] : $product->total_qty;
            } else {
                echo $product->total_qty;
            }
        @endphp;

        function changeQuantity(amount) {
            var quantityElement = document.querySelector('.quantity');
            var currentQuantity = parseInt(quantityElement.innerText);
            var newQuantity = currentQuantity + amount;

            // Ensure the quantity doesn't go below 1 and doesn't exceed the maxAllowedQuantity
            newQuantity = Math.max(Math.min(newQuantity, maxAllowedQuantity), 1);

            // Update the quantity in the UI
            quantityElement.innerText = newQuantity;
        }

        $(document).on('click', '.add', function(a) {
            a.preventDefault();
            var id = $(this).data('id');
            var quantity = document.querySelector('.quantity').innerText;

            $.ajax({
                url: '/products/' + id + '/detailaddtocart?quantity=' + quantity,
                type: 'GET',
                success: function() {
                    window.location.reload();
                }
            });

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
                        url: '/products/' + id + '/review/delete',
                        type: 'DELETE',
                        success: function(response) {
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

        

        $(document).on('click', '.reviewUpdate', function(a) {
            a.preventDefault();
            var id = $(this).data('id');
            var formData = $('#updateReviewForm'+id).serialize(); // Serialize form data



            $.ajax({
                url: '/products/' + id + '/review/update',
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
