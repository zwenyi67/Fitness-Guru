<x-layout>

    <div class="container-fluid shop-nav">
        <div class="row p-3 py-4">
            <div class="col-lg-2 col-md-12">

            </div>
            <div class="col-lg-1 col-md-12 me-2">
                <div class="container mt-4 ">
                    <div style="padding-top: 15px;" class="dropdown mb-3">
                        <a class="dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ request('sport') ? Str::upper($sports->find(request('sport'))->type) : 'SPORTS' }}
                        </a>
                        <ul class="dropdown-menu" style="max-height: 300px; overflow-y: auto;">
                            <li>
                                <a class="dropdown-item  mt-2 {{ empty(request('sport')) ? 'active' : '' }}"
                                    href="/trainers?{{ http_build_query(request()->except('sport', 'page')) }}">
                                    SPORTS
                                </a>
                            </li>
                            @foreach ($sports as $sport)
                                <li>
                                    <a class="dropdown-item  mt-2 {{ request('sport') && request('sport') == $sport->id ? 'active' : '' }}"
                                        href="/trainers?sport={{ $sport->id }}&{{ http_build_query(request()->except('sport', 'page')) }}">
                                        {{ Str::upper($sport->type) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="container pt-4 mb-3">
                    <div class="">
                        <form method="GET" action="/trainers" class="input-group input-group-lg">
                            @if (request('sport'))
                                <input type="hidden" name="sport" value="{{ request('sport') }}">
                            @endif
                            @if (request('gender'))
                                <input type="hidden" name="gender" value="{{ request('gender') }}">
                            @endif
                            @if (request('price'))
                                <input type="hidden" name="price" value="{{ request('price') }}">
                            @endif
                            <input type="text" name="search" placeholder="Search Trainer By Name"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                                class="form-control" style="" value="{{ request('search') }}">
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-12">
                <div class="container mt-4 ">
                    <div style="padding-top: 15px;" class="dropdown mb-3">
                        <a class="dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if(request('gender') == 2)
                                FEMALE
                            @elseif (request('gender') == 1)
                                MALE
                            @else
                                GENDER
                            @endif
                        </a>
                        <ul class="dropdown-menu" style="max-height: 300px; overflow-y: auto;">
                            <li>
                                <a class="dropdown-item mt-2 {{ empty(request('gender')) ? 'active' : '' }}"
                                    href="/trainers?{{ http_build_query(request()->except('gender', 'page')) }}">
                                    GENDER
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item mt-2 {{ request('gender') && request('gender') == 1 ? 'active' : '' }}"
                                    href="/trainers?gender=1&{{ http_build_query(request()->except('gender', 'page')) }}">
                                    MALE
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item mt-2 {{ request('gender') && request('gender') == 2 ? 'active' : '' }}"
                                    href="/trainers?gender=2&{{ http_build_query(request()->except('gender', 'page')) }}">
                                    FEMALE
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-1">

            </div>

            <div class="col-lg-2 col-md-12">

            </div>
        </div>
    </div>

    <div style="padding: 20px;" class="container mt-5">
        <div class="row">
            <div class="container">
                <div class="row">
                    @foreach ($trainers as $trainer)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div style="border: none;" class="card">
                                <a href="/trainers/{{ $trainer->id }}/detail"
                                    style="max-height: 450px; overflow: hidden;">
                                    <img style="width: 100%; max-height: 450px; object-fit: cover; object-position: center;"
                                        src="/storage/uploads/{{ $trainer->image }}" class="trainer-image"
                                        alt="...">
                                </a>
                                <div class="">
                                    <h5 class="mt-4 p-0 fs-3">{{ $trainer->name }}</h5>
                                    <div class=""><i class="fa-solid fa-dumbbell"></i>
                                        {{ $trainer->sport->type }} | <i class="fa-regular fa-clock"></i>
                                        {{ round($trainer->experience) }}+ years in industry </div>
                                    <div class="mb-3 pt-2">
                                        @if ($trainer->courses->count() > 0)
                                            <i class="fa-solid fa-arrow-trend-up"></i> {{ $trainer->courses->count() }}
                                            courses |
                                        @endif

                                        <i class="fa-solid fa-money-check-dollar"></i> ${{ $trainer->hourly_rate }}
                                        Hourly_rate
                                    </div>

                                    <div class="d-flex pt-1 me-3 fs-5 mb-3">

                                        @php
                                            $start = 1;
                                            $allReview = 0;
                                            $reviewCount = $trainer->trainerReviews->count();

                                            foreach ($trainer->trainerReviews as $review) {
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
                                        <div style="font-size: 16px;" class="ms-2">
                                            {{ $avgReview }} Reviews & Ratings
                                        </div>
                                    </div>
                                    <div style="max-height: 50px; min-height: 50px;">
                                        {{ Str::words($trainer->description, 15) }}
                                    </div>
                                </div>
                            </div>
                            <hr>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</x-layout>
