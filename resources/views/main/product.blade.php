<x-layout>



    @include('user.products.layout')

    <div style="z-index: 999;" class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mt-3" >
                <div style="border-radius: 8px; overflow: hidden;" class="card">
                    <div style="overflow: hidden;" id="carouselExampleDark" class="carousel carousel-dark slide">
                        <div class="carousel-indicators">
                          <button style="background: rgb(175, 154, 238);" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button style="background: rgb(175, 154, 238);" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button style="background: rgb(175, 154, 238);" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div style="min-height: 45vh; min-height: 45vh;"  class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="10000">
                            <img style="height: 100%; width: 100%; max-height:  object-fit: cover; object-position: center;" src="{{ asset('/images/carousel0.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img style="height: 100%; width: 100%; max-height:  object-fit: cover; object-position: center;" src="{{ asset('/images/carousel1.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Second slide label</h5>
                              <p>Some representative placeholder content for the second slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img style="height: 100%; width: 100%; max-height:  object-fit: cover; object-position: center;" src="{{ asset('/images/carousel2.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Third slide label</h5>
                              <p>Some representative placeholder content for the third slide.</p>
                            </div>
                          </div>
                        </div>
                        <button style="color: red;" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                          <span  class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                          <span  class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div style="overflow: hidden; border-radius: 8px;" class="card">
                    <div style="width: 100%; height: 100%; min-height: 45vh; min-height: 45vh; overflow: hidden; border-radius: 8px;">
                        <img style="width: 100%; height: 100%;  
                        overflow: hidden; object-fit: cover; object-position: center; min-height: 45vh; max-height: 45vh;" 
                        src="{{ asset('images/protein2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="fs-4 mb-3 fw-semibold">
            NEW ARRIVAL
        </div>
        <div class="row">
            @foreach ($arrivals as $arrival)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mb-3">
                        <div class="image-container">
                            <img src="/uploads/{{ $arrival->image }}" class="card-img-top" alt="">
                            <div class="overlay">
                                <a href="" class="button addToCart" title="Add to cart"
                                    data-id="{{ $arrival->id }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                @if (auth()->check())
                                    
                                @if(auth()->user()->wishlists->contains('product_id', $arrival->id)) 
                                <a href="" class="button removeWish text-danger" title="Wishlist" data-id="{{ $arrival->id }}">
                                    <i class="fa-solid fa-heart text-danger"></i>
                                </a>
                                @else
                                <a href="" class="button wish" title="Wishlist" data-id="{{ $arrival->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                @endif
                                @else
                                <a href="#" class="button" title="Wishlist" data-id="{{ $arrival->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                @endif
                               

                                <a href="/products/{{ $arrival->id }}/detail" class="button" title="Details">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h5 class="card-title">{{ $arrival->name }}</h5>
                            <div class="d-flex pt-1 me-3 fs-5 mb-3">

                                @php
                                    $start = 1;
                                    $allReview = 0;
                                    $reviewCount = $arrival->productReviews->count();

                                    foreach ($arrival->productReviews as $review) {
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
                            <p class="card-text"><small class="text-body-secondary">$ {{ $arrival->price }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($arrivals->count() == 0)
                <div class="container mt-5 d-flex flex-column justify-content-center align-items-center">
                    <div class="fs-3 mb-3 text-danger"><i class="fa-regular fa-face-sad-tear"></i> No results found !</div>
                    <div class="d-flex justify-content-center">We're sorry. We cannot find any matches for your search term.</div>
                </div>
            @endif
        </div>
    </div>

    <div class="container">
        <hr>
    </div>

    {{-- best seller section --}}

    <div class="container mt-5">
      
        <div class="fs-4 mb-3 fw-semibold">
            BEST SELLER
        </div>
        <div class="row">
            @foreach ($bests as $best)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mb-3">
                        <div class="image-container">
                            <img src="/uploads/{{ $best?->image }}" class="card-img-top" alt="">
                            <div class="overlay">
                                <a href="" class="button addToCart" title="Add to cart"
                                    data-id="{{ $best->id }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                @if (auth()->check())
                                    
                                @if(auth()->user()->wishlists->contains('product_id', $best->id)) 
                                <a href="" class="button removeWish text-danger" title="Wishlist" data-id="{{ $best->id }}">
                                    <i class="fa-solid fa-heart text-danger"></i>
                                </a>
                                @else
                                <a href="" class="button wish" title="Wishlist" data-id="{{ $best->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                @endif
                                @else
                                <a href="#" class="button" title="Wishlist" data-id="{{ $best->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                @endif
                               

                                <a href="/products/{{ $best->id }}/detail" class="button" title="Details">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h5 class="card-title">{{ $best->name }}</h5>
                            <div class="d-flex pt-1 me-3 fs-5 mb-3">

                                @php
                                    $start = 1;
                                    $allReview = 0;
                                    $reviewCount = $best->productReviews->count();

                                    foreach ($best->productReviews as $review) {
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
                            <p class="card-text"><small class="text-body-secondary">$ {{ $best->price }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($bests->count() == 0)
                <div class="container mt-5 d-flex flex-column justify-content-center align-items-center">
                    <div class="fs-3 mb-3 text-danger"><i class="fa-regular fa-face-sad-tear"></i> No results found !</div>
                    <div class="d-flex justify-content-center">We're sorry. We cannot find any matches for your search term.</div>
                </div>
            @endif
        </div>
      
    </div>



    <div class="container">
        <hr>
    </div>


    {{-- Just for you section --}}


    <div class="container mt-5">
        
        <div id="foryou" class="fs-4 mb-3 fw-semibold">
            JUST FOR YOU
        </div>
        <div  class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card mb-3">
                        <div class="image-container">
                            <img style="object-fit: cover;" src="/uploads/{{ $product->image }}" class="card-img-top" alt="">
                            <div class="overlay">
                                <a href="" class="button addToCart" title="Add to cart"
                                    data-id="{{ $product->id }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                @if (auth()->check())
                                    
                                @if(auth()->user()->wishlists->contains('product_id', $product->id)) 
                                <a href="" class="button removeWish text-danger" title="Wishlist" data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-heart text-danger"></i>
                                </a>
                                @else
                                <a href="" class="button wish" title="Wishlist" data-id="{{ $product->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                @endif
                                @else
                                <a href="#" class="button" title="Wishlist" data-id="{{ $product->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                @endif
                               

                                <a href="/products/{{ $product->id }}/detail" class="button" title="Details">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="d-flex pt-1 me-3 fs-5 mb-3">

                                @php
                                    $start = 1;
                                    $allReview = 0;
                                    $reviewCount = $product->productReviews->count();

                                    foreach ($product->productReviews as $review) {
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
                            <p class="card-text"><small class="text-body-secondary">$ {{ $product->price }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($products->count() == 0)
                <div class="container mt-5 d-flex flex-column justify-content-center align-items-center">
                    <div class="fs-3 mb-3 text-danger"><i class="fa-regular fa-face-sad-tear"></i> No results found !</div>
                    <div class="d-flex justify-content-center">We're sorry. We cannot find any matches for your search term.</div>
                </div>
            @endif
        </div>
        {{ $products->links() }}
      
    </div>


    <div class="container mt-4">
        <div class="row ">
            <hr>
        </div>
        <div class="row mt-5">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <i style="font-size: 60px;" class="fa-solid fa-truck-fast"></i>
                    <div class="mt-3 mb-2 fw-medium fs-5">
                        Fast Delivery
                    </div>
                    <p class="px-3" style="text-align: center; color: rgb(123, 121, 121);">
                        And free returns. See checkout for delivery dates.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <i class="fa-solid fa-money-check fa-rotate-by" style="--fa-rotate-angle: 140deg; font-size: 60px;"></i>
                    <div class="mt-3 mb-2 fw-medium fs-5">
                        Safe Payment
                    </div>
                    <p class="px-3" style="text-align: center; color: rgb(123, 121, 121);">
                        Pay with the world's most popular and secure payment methods.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <i class="fa-solid fa-shield-heart" style="font-size: 60px;"></i>
                    <div class="mt-3 mb-2 fw-medium fs-5">
                        Shop with confidence
                    </div>
                    <p class="px-3" style="text-align: center; color: rgb(123, 121, 121);">
                        Our Buyer Protection covers your purchasefrom click to delivery.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <i style="font-size: 60px;"  class="fa-solid fa-comments"></i>
                    <div class="mt-3 mb-2 fw-medium fs-5">
                        24/7 Help Center
                    </div>
                    <p class="px-3" style="text-align: center; color: rgb(123, 121, 121);">
                        Have a question? Call a Specialist or chat online.
                    </p>
                </div>
            </div>
            
        </div>
        
    </div>


    <script>
        


        $(document).on('click', '.addToCart', function(a) {
            a.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: '/products/' + id + '/addtocart',
                type: 'GET',
                success: function() {
                    window.location.reload();
                }
            });
        });

        $(document).on('click', '.wish', function(a) {
            a.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: '/products/' + id + '/wishlist',
                type: 'GET',
                success: function() {
                    window.location.reload();
                }
            });
        });

        $(document).on('click', '.removeWish', function(a) {
            a.preventDefault();
            var pid = $(this).data('id');

            $.ajax({
                url: '/products/' + pid + '/wishlist/remove',
                type: 'GET',
                success: function() {
                    window.location.reload();
                }
            });
        });
    </script>


</x-layout>
