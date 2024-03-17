<x-layout>


    <div class="container mt-5 ">
        <div class="row">

            {{-- offcanvas filter start --}}
            <nav class="navbar">
                <div class="container-fluid">
                    <button style="margin-left: 12px;" class="checkout off-filter ps-3 p-2 px-4 mb-4" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
                        aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        FILTER <i class="fa-solid fa-filter ms-2"></i>
                    </button>
                    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                        aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">FILTER</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="container-fluid">
                                <div class="d-flex mb-5">
                                    <div class="fs-4 me-auto fw-semibold ">
                                        FILTERS
                                    </div>
                                    <a href="/courses" class="btn btn-light">Reset</a>
                                </div>
                                <div class="mb-4">
                                    <div class="mb-2 fs-5 fw-medium">
                                        SEARCH BY NAME
                                    </div>
                                    <div class="">
                                        <form method="GET" action="/courses/" class="input-group">

                                            @if (request('topic'))
                                                <input type="hidden" name="topic" value="{{ request('topic') }}">
                                            @endif
                                            @if (request('method'))
                                                <input type="hidden" name="method" value="{{ request('method') }}">
                                            @endif
                                            @if (request('fee-1'))
                                                <input type="hidden" name="fee-1" value="{{ request('fee-1') }}">
                                            @endif
                                            @if (request('fee-2'))
                                                <input type="hidden" name="fee-2" value="{{ request('fee-2') }}">
                                            @endif
                                            <input style="background: black; color: white;"
                                                class="form-control text-white" type="text" name="search"
                                                placeholder="Search Course By Name" value="{{ request('search') }}">
                                            <button class="btn btn-light" type="submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>


                                <div class="mb-4">
                                    <div class="mb-2 fs-5 fw-medium">
                                        CATEGORIES
                                    </div>
                                    <div>
                                        <ul style="border: 1px solid; border-radius: 5px; max-height: 46.3vh; overflow-y: auto;"
                                            class="p-0 py-2 m-0">
                                            <li
                                                class="nav-items mt-1 {{ empty(request('topic')) ? 'nav-items-active' : '' }}">
                                                <a class="nav-link  ps-2 py-1 "
                                                    href="/courses?{{ http_build_query(request()->except('topic', 'page')) }}">
                                                    ALL TYPES
                                                </a>
                                            </li>
                                            @foreach ($topics as $topic)
                                                <li
                                                    class="nav-items mt-1 {{ request('topic') && request('topic') == $topic->id ? 'nav-items-active' : '' }}">
                                                    <a class="nav-link  ps-2 py-1 "
                                                        href="/courses?topic={{ $topic->id }}&{{ http_build_query(request()->except('topic', 'page')) }}">
                                                        {{ Str::ucfirst($topic->name) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>

                                <div class="mb-4">
                                    <div class="mb-2 fs-5 fw-medium">
                                        LAUNCH METHOD
                                    </div>
                                    <div>
                                        <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                            <li
                                                class="nav-items mt-1 {{ empty(request('method')) ? 'nav-items-active' : '' }}">
                                                <a class="nav-link ps-2 py-1 "
                                                    href="/courses?{{ http_build_query(request()->except('method', 'page')) }}">
                                                    ALL
                                                </a>
                                            </li>

                                            <li
                                                class="nav-items mt-1 {{ request('method') && request('method') == 1 ? 'nav-items-active' : '' }}">
                                                <a class="nav-link  ps-2 py-1"
                                                    href="/courses?method=1&{{ http_build_query(request()->except('method', 'page')) }}">
                                                    ONLINE
                                                </a>
                                            </li>
                                            <li
                                                class="nav-items mt-1 {{ request('method') && request('method') == 2 ? 'nav-items-active' : '' }}">
                                                <a class="nav-link  ps-2 py-1"
                                                    href="/courses?method=2&{{ http_build_query(request()->except('method', 'page')) }}">
                                                    IN CLASS
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="mb-2 fs-5 fw-medium">
                                        FEES
                                    </div>
                                    <div>
                                        <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                            <li
                                                class="nav-items mt-1 {{ (request('fee-1') && request('fee-2') && request('fee-1') == 1 && request('fee-2') == 3000) || (empty(request('fee-1')) && empty(request('fee-2'))) ? 'nav-items-active' : '' }}">
                                                <a class="nav-link  ps-2 py-1 "
                                                    href="/courses?{{ http_build_query(array_merge(request()->except('fee-1', 'fee-2', 'page'), ['fee-1' => 1, 'fee-2' => 3000])) }}">
                                                    ALL
                                                </a>
                                            </li>
                                            <li
                                                class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 1 && request('fee-2') == 10 ? 'nav-items-active' : '' }}">
                                                <a class="nav-link ps-2 py-1 "
                                                    href="/courses?fee-1=1&fee-2=10&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                                    UNDER $10
                                                </a>
                                            </li>
                                            <li
                                                class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 10 && request('fee-2') == 100 ? 'nav-items-active' : '' }}">
                                                <a class="nav-link ps-2 py-1 "
                                                    href="/courses?fee-1=10&fee-2=100&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                                    $10 - $100
                                                </a>
                                            </li>
                                            <li
                                                class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 100 && request('fee-2') == 300 ? 'nav-items-active' : '' }}">
                                                <a class="nav-link ps-2 py-1 "
                                                    href="/courses?fee-1=100&fee-2=300&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                                    $100 - $300
                                                </a>
                                            </li>
                                            <li
                                                class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 300 && request('fee-2') == 600 ? 'nav-items-active' : '' }}">
                                                <a class="nav-link ps-2 py-1 "
                                                    href="/courses?fee-1=300&fee-2=600&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                                    $300 - $600
                                                </a>
                                            </li>
                                            <li
                                                class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 600 && request('fee-2') == 3000 ? 'nav-items-active' : '' }}">
                                                <a class="nav-link ps-2 py-1 "
                                                    href="/courses?fee-1=600&fee-2=3000&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                                    ABOVE $600 +
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            {{-- offcanvas filter end --}}

            <div style="border-right: 2px solid;" class="col-lg-3 normal-filter">
                <div class="container-fluid">
                    <div class="d-flex mb-5">
                        <div class="fs-4 me-auto fw-semibold ">
                            FILTERS
                        </div>
                        <a href="/courses" class="btn btn-dark">Reset</a>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            SEARCH BY NAME
                        </div>
                        <div class="">
                            <form method="GET" action="/courses/" class="input-group">

                                @if (request('topic'))
                                    <input type="hidden" name="topic" value="{{ request('topic') }}">
                                @endif
                                @if (request('method'))
                                    <input type="hidden" name="method" value="{{ request('method') }}">
                                @endif
                                @if (request('fee-1'))
                                    <input type="hidden" name="fee-1" value="{{ request('fee-1') }}">
                                @endif
                                @if (request('fee-2'))
                                    <input type="hidden" name="fee-2" value="{{ request('fee-2') }}">
                                @endif
                                <input class="form-control" type="text" name="search"
                                    placeholder="Search Course By Name" value="{{ request('search') }}">
                                <button class="btn btn-dark text-white" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>


                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            CATEGORIES
                        </div>
                        <div>
                            <ul style="border: 1px solid; border-radius: 5px; max-height: 46.3vh; overflow-y: auto;"
                                class="p-0 py-2 m-0">
                                <li class="nav-items mt-1 {{ empty(request('topic')) ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/courses?{{ http_build_query(request()->except('topic', 'page')) }}">
                                        ALL TYPES
                                    </a>
                                </li>
                                @foreach ($topics as $topic)
                                    <li
                                        class="nav-items mt-1 {{ request('topic') && request('topic') == $topic->id ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/courses?topic={{ $topic->id }}&{{ http_build_query(request()->except('topic', 'page')) }}">
                                            {{ Str::ucfirst($topic->name) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            LAUNCH METHOD
                        </div>
                        <div>
                            <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                <li class="nav-items mt-1 {{ empty(request('method')) ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/courses?{{ http_build_query(request()->except('method', 'page')) }}">
                                        ALL
                                    </a>
                                </li>

                                <li
                                    class="nav-items mt-1 {{ request('method') && request('method') == 1 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1"
                                        href="/courses?method=1&{{ http_build_query(request()->except('method', 'page')) }}">
                                        ONLINE
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('method') && request('method') == 2 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1"
                                        href="/courses?method=2&{{ http_build_query(request()->except('method', 'page')) }}">
                                        IN CLASS
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            FEES
                        </div>
                        <div>
                            <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                <li
                                    class="nav-items mt-1 {{ (request('fee-1') && request('fee-2') && request('fee-1') == 1 && request('fee-2') == 3000) || (empty(request('fee-1')) && empty(request('fee-2'))) ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/courses?{{ http_build_query(array_merge(request()->except('fee-1', 'fee-2', 'page'), ['fee-1' => 1, 'fee-2' => 3000])) }}">
                                        ALL
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 1 && request('fee-2') == 10 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/courses?fee-1=1&fee-2=10&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                        UNDER $10
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 10 && request('fee-2') == 100 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/courses?fee-1=10&fee-2=100&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                        $10 - $100
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 100 && request('fee-2') == 300 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/courses?fee-1=100&fee-2=300&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                        $100 - $300
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 300 && request('fee-2') == 600 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/courses?fee-1=300&fee-2=600&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                        $300 - $600
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('fee-1') && request('fee-2') && request('fee-1') == 600 && request('fee-2') == 3000 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/courses?fee-1=600&fee-2=3000&{{ http_build_query(request()->except('fee-1', 'fee-2', 'page')) }}">
                                        ABOVE $600 +
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="container">
                    <div class="row mb-4">
                        <div class="fs-3 fw-semibold">
                            {{ $coursescount->count() }} Results Found
                        </div>
                    </div>
                    <div class="row">
                        @if ($courses->count() > 0)

                            @foreach ($courses as $course)
                                <div class="col-lg-4 col-md-6 mb-3">

                                    <div style="border: none;" class="card">
                                        <a href="/courses/{{ $course->id }}/detail"
                                            style="max-height: 400px; overflow: hidden;">
                                            <img style="max-height: 230px; min-height: 230px; object-fit: cover; object-position: center;"
                                                src="/uploads/{{ $course->image }}" class="card-img-top"
                                                alt="...">
                                        </a>
                                        <div class="">
                                            <div style="font-size: 18px;" class="mb-2 mt-3 fw-semibold">
                                                {{ $course->name }}</div>
                                            <div style="color: rgb(109, 105, 105);" class="d-flex mb-1">
                                                <div class="d-flex me-2">
                                                    <i style="padding-top: 2px; font-size: 14px;"
                                                        class="fa-solid fa-user-secret me-1"></i>
                                                    <a href="/trainers/{{ $course->trainer->id }}/detail"
                                                        style="font-size: 14px;">{{ Str::upper($course->trainer->name) }}
                                                    </a>
                                                </div> | &nbsp;
                                                <div class="d-flex me-3">
                                                    <i style="padding-top: 3px; font-size: 14px;"
                                                        class="fa-solid fa-award me-1"></i>
                                                    <span style="font-size: 14px;"> {{ $course->topic->name }}</span>
                                                </div>
                                            </div>
                                            <div style="color: rgb(109, 105, 105);" class="d-flex mb-2">
                                                <div class="d-flex me-3 mb-2">
                                                    <i style="padding-top: 2px; font-size: 14px;"
                                                        class="fa-solid fa-sack-dollar me-1"></i>
                                                    <span style="font-size: 14px;">{{ Str::upper($course->price) }}$
                                                    </span>
                                                </div> | &nbsp;
                                                <div class="d-flex me-3">
                                                    <i style="padding-top: 3px; font-size: 14px;"
                                                        class="fa-solid fa-globe me-1"></i>
                                                    <span style="font-size: 14px;">
                                                        {{ $course->method == 1 ? 'Online' : 'InClass' }} </span>
                                                </div>
                                            </div>

                                            <div style="max-height: 53px; min-height: 53px; font-size: 14px;"
                                                class="">
                                                {{ Str::words($course->description, 12) }}</div>

                                            <a href="/courses/{{ $course->id }}/detail" class="">JOIN</a>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            @endforeach
                        @else
                            <div style="height: 65vh;"
                                class="container mt-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="fs-3 mb-3 text-danger"><i
                                        class="fa-regular fa-face-sad-tear fa-beat me-2"></i> No results found !</div>
                                <div class="d-flex justify-content-center">We're sorry. We cannot find any matches for
                                    your search term.</div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div>
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container mt-5">
        <hr>
        <div class="row ">
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
                    <i class="fa-solid fa-money-check fa-rotate-by"
                        style="--fa-rotate-angle: 140deg; font-size: 60px;"></i>
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
                    <i style="font-size: 60px;" class="fa-solid fa-comments"></i>
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

</x-layout>
