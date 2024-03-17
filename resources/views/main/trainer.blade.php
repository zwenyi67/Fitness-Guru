<x-layout>



    <div class="container mt-5">
        <div class="row">

            {{-- offcanvas filter start --}}
            <nav class="navbar">
                <div class="container-fluid">
                  <button style="margin-left: 12px;" class="checkout off-filter ps-3 p-2 px-4 mb-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    FILTERS <i class="fa-solid fa-filter ms-2"></i>
                  </button>
                  <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">FILTER</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="container-fluid">
                        <div class="d-flex mb-5">
                        <div class="fs-4 me-auto fw-semibold ">
                            FILTERS 
                        </div>
                        <a href="/trainers" class="btn btn-light">Reset</a>
                    </div>
                        <div class="mb-4">
                            <div class="mb-2 fs-5 fw-medium">
                                SEARCH BY NAME
                            </div>
                            <div class="">
                                <form method="GET" action="/trainers" class="input-group">
                                    @if (request('sport'))
                                        <input type="hidden" name="sport" value="{{ request('sport') }}">
                                    @endif
                                    @if (request('gender'))
                                        <input type="hidden" name="gender" value="{{ request('gender') }}">
                                    @endif
                                    @if (request('ex-1'))
                                        <input type="hidden" name="ex-1" value="{{ request('ex-1') }}">
                                    @endif
                                    @if (request('ex-2'))
                                        <input type="hidden" name="ex-2" value="{{ request('ex-2') }}">
                                    @endif
                                    @if (request('hour-1'))
                                        <input type="hidden" name="hour-1" value="{{ request('hour-1') }}">
                                    @endif
                                    @if (request('hour-2'))
                                        <input type="hidden" name="hour-2" value="{{ request('hour-2') }}">
                                    @endif
                                    @if (request('age-1'))
                                        <input type="hidden" name="age-1" value="{{ request('age-1') }}">
                                    @endif
                                    @if (request('age-2'))
                                        <input type="hidden" name="age-2" value="{{ request('age-2') }}">
                                    @endif
                                    @if (request('region'))
                                        <input type="hidden" name="region" value="{{ request('region') }}">
                                    @endif
    
                                    <input style="background: black; color: white;" type="text" name="search" placeholder="Search Trainer By Name"
                                        class="form-control" style="" value="{{ request('search') }}">
                                    <button class="btn btn-light" type="submit">
                                        <i style="font-size: 13px;" class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-2 fs-5 fw-medium">
                                GENDER
                            </div>
                            <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                <li class="nav-items mt-1 {{ empty(request('gender')) ? 'nav-items-active' : '' }}">
                                    <a class="dropdown-item ps-2 py-1 "
                                        href="/trainers?{{ http_build_query(request()->except('gender', 'page')) }}">
                                        ALL
                                    </a>
                                </li>
                                <li class="nav-items mt-1 {{ request('gender') && request('gender') == 1 ? 'nav-items-active' : '' }}">
                                    <a class="dropdown-item ps-2 py-1 "
                                        href="/trainers?gender=1&{{ http_build_query(request()->except('gender', 'page')) }}">
                                        MALE
                                    </a>
                                </li>
                                <li class="nav-items mt-1 {{ request('gender') && request('gender') == 2 ? 'nav-items-active' : '' }}">
                                    <a class="dropdown-item ps-2 py-1 {{ request('gender') && request('gender') == 2 ? 'nav-items-active' : '' }}"
                                        href="/trainers?gender=2&{{ http_build_query(request()->except('gender', 'page')) }}">
                                        FEMALE
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-4">
                            <div class="mb-2 fs-5 fw-medium">
                                SPORT TYPES
                            </div>
                            <div>
                                <ul style="border: 1px solid; border-radius: 5px; max-height: 35vh; overflow-y: auto;"
                                    class="p-0 py-2 m-0">
                                    <li class="nav-items mt-1 {{ empty(request('sport')) ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?{{ http_build_query(request()->except('sport', 'page')) }}">
                                            ALL TYPES
                                        </a>
                                    </li>
                                    @foreach ($sports as $sport)
                                        <li
                                            class="nav-items mt-1 {{ request('sport') && request('sport') == $sport->id ? 'nav-items-active' : '' }}">
                                            <a class="nav-link  ps-2 py-1 "
                                                href="/trainers?sport={{ $sport->id }}&{{ http_build_query(request()->except('sport', 'page')) }}">
                                                {{ Str::upper($sport->type) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
    
                        </div>
    
                        <div class="mb-4">
                            <div class="mb-2 fs-5 fw-medium">
                                AGE
                            </div>
                            <div>
                                <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                    <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 1 && request('age-2') == 60 || (empty(request('age-1')) && empty(request('age-2'))) ? 'nav-items-active' : ''}}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                            ALL
                                        </a>
                                    </li>
    
                                    <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 18 && request('age-2') == 25 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?age-1=18&age-2=25&{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                            18 - 25 YEARS OLD
                                        </a>
                                    </li>
                                    <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 26 && request('age-2') == 35 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1"
                                            href="/trainers?age-1=26&age-2=35&{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                            26 - 35 YEARS OLD
                                        </a>
                                    </li>
                                    <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 36 && request('age-2') == 45 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1"
                                            href="/trainers?age-1=36&age-2=45&{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                            36 - 45 YEARS OLD
                                        </a>
                                    </li>
                                    <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 46 && request('age-2') == 80 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1"
                                            href="/trainers?age-1=46&age-2=80&{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                            ABOVE 46 YEARS OLD
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-2 fs-5 fw-medium">
                                EXPERIENCE
                            </div>
                            <div>
                                <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                    <li
                                        class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 1 && request('ex-2') == 60 || (empty(request('ex-1')) && empty(request('ex-2'))) ? 'nav-items-active' : '' }}">
                                        <a class="nav-link ps-2 py-1 "
                                            href="/trainers?{{ http_build_query(array_merge(request()->except('ex-1', 'ex-2', 'page'), ['ex-1' => 1, 'ex-2' => 60])) }}">
                                            ALL
                                        </a>
                                    </li>
    
                                    <li
                                        class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 1 && request('ex-2') == 2 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1"
                                            href="/trainers?ex-1=1&ex-2=2&{{ http_build_query(request()->except('ex-1', 'ex-2', 'page')) }}">
                                            1 - 2 YEARS
                                        </a>
                                    </li>
                                    <li
                                        class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 3 && request('ex-2') == 6 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?ex-1=3&ex-2=6&{{ http_build_query(request()->except('ex-1', 'ex-2', 'page')) }}">
                                            3 - 6 YEARS
                                        </a>
                                    </li>
                                    <li
                                        class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 7 && request('ex-2') == 9 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?ex-1=7&ex-2=9&{{ http_build_query(request()->except('ex-1', 'ex-2', 'page')) }}">
                                            7 - 9 YEARS
                                        </a>
                                    </li>
                                    <li
                                        class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 10 && request('ex-2') == 40 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?ex-1=10&ex-2=40&{{ http_build_query(request()->except('ex-1', 'ex-2', 'page')) }}">
                                            ABOVE 10 YEARS
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-2 fs-5 fw-medium">
                                HOURLY_RATE
                            </div>
                            <div>
                                <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                    <li class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 1 && request('hour-2') == 3000 || (empty(request('hour-1')) && empty(request('hour-2'))) ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?{{ http_build_query(array_merge(request()->except('hour-1', 'hour-2', 'page'), ['hour-1' => 1, 'hour-2' => 3000])) }}">
                                            ALL
                                        </a>        
                                    </li>
                                    <li
                                        class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 1 && request('hour-2') == 10 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link ps-2 py-1 "
                                            href="/trainers?hour-1=1&hour-2=10&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                            UNDER $10
                                        </a>
                                    </li>
                                    <li
                                        class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 10 && request('hour-2') == 100 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link ps-2 py-1 "
                                            href="/trainers?hour-1=10&hour-2=100&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                            $10 - $100
                                        </a>
                                    </li>
                                    <li
                                        class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 100 && request('hour-2') == 300 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link ps-2 py-1 "
                                            href="/trainers?hour-1=100&hour-2=300&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                            $100 - $300
                                        </a>
                                    </li>
                                    <li
                                        class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 300 && request('hour-2') == 600 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link ps-2 py-1 "
                                            href="/trainers?hour-1=300&hour-2=600&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                            $300 - $600
                                        </a>
                                    </li>
                                    <li
                                        class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 600 && request('hour-2') == 3000 ? 'nav-items-active' : '' }}">
                                        <a class="nav-link ps-2 py-1 "
                                            href="/trainers?hour-1=600&hour-2=3000&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                            ABOVE $600 +
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-2 fs-5 fw-medium">
                                REGION
                            </div>
                            <div>
                                <ul style="border: 1px solid; border-radius: 5px; max-height: 35vh; overflow-y: auto;" class="p-0 py-2 m-0">
                                    <li class="nav-items mt-1 {{ empty(request('region')) ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?{{ http_build_query(request()->except('region', 'page')) }}">
                                            ALL REGIONS
                                        </a>
                                    </li>
                                    @foreach ($regions as $region)
                                        <li class="nav-items mt-1 {{ request('region') && request('region') == $region->id ? 'nav-items-active' : '' }}">
                                            <a class="nav-link  ps-2 py-1 "
                                                href="/trainers?region={{ $region->id }}&{{ http_build_query(request()->except('region', 'page')) }}">
                                                {{ Str::ucfirst($region->name) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </nav>
              
                          {{-- offcanvas filter end --}}




                          {{-- normal filter start --}}

            <div style="border-right: 2px solid;" class="col-lg-3 normal-filter">
                <div class="container-fluid">
                    <div class="d-flex mb-5">
                    <div class="fs-4 me-auto fw-semibold ">
                        FILTERS 
                    </div>
                    <a href="/trainers" class="btn btn-dark">Reset</a>
                </div>
                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            SEARCH BY NAME
                        </div>
                        <div class="">
                            <form method="GET" action="/trainers" class="input-group">
                                @if (request('sport'))
                                    <input type="hidden" name="sport" value="{{ request('sport') }}">
                                @endif
                                @if (request('gender'))
                                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                                @endif
                                @if (request('ex-1'))
                                    <input type="hidden" name="ex-1" value="{{ request('ex-1') }}">
                                @endif
                                @if (request('ex-2'))
                                    <input type="hidden" name="ex-2" value="{{ request('ex-2') }}">
                                @endif
                                @if (request('hour-1'))
                                    <input type="hidden" name="hour-1" value="{{ request('hour-1') }}">
                                @endif
                                @if (request('hour-2'))
                                    <input type="hidden" name="hour-2" value="{{ request('hour-2') }}">
                                @endif
                                @if (request('age-1'))
                                    <input type="hidden" name="age-1" value="{{ request('age-1') }}">
                                @endif
                                @if (request('age-2'))
                                    <input type="hidden" name="age-2" value="{{ request('age-2') }}">
                                @endif
                                @if (request('region'))
                                    <input type="hidden" name="region" value="{{ request('region') }}">
                                @endif

                                <input type="text" name="search" placeholder="Search Trainer By Name"
                                    class="form-control" style="" value="{{ request('search') }}">
                                <button class="btn btn-dark" type="submit">
                                    <i style="font-size: 13px;" class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            GENDER
                        </div>
                        <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                            <li class="nav-items mt-1 {{ empty(request('gender')) ? 'nav-items-active' : '' }}">
                                <a class="dropdown-item ps-2 py-1 "
                                    href="/trainers?{{ http_build_query(request()->except('gender', 'page')) }}">
                                    ALL
                                </a>
                            </li>
                            <li class="nav-items mt-1 {{ request('gender') && request('gender') == 1 ? 'nav-items-active' : '' }}">
                                <a class="dropdown-item ps-2 py-1 "
                                    href="/trainers?gender=1&{{ http_build_query(request()->except('gender', 'page')) }}">
                                    MALE
                                </a>
                            </li>
                            <li class="nav-items mt-1 {{ request('gender') && request('gender') == 2 ? 'nav-items-active' : '' }}">
                                <a class="dropdown-item ps-2 py-1 {{ request('gender') && request('gender') == 2 ? 'nav-items-active' : '' }}"
                                    href="/trainers?gender=2&{{ http_build_query(request()->except('gender', 'page')) }}">
                                    FEMALE
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            SPORT TYPES
                        </div>
                        <div>
                            <ul style="border: 1px solid; border-radius: 5px; max-height: 35vh; overflow-y: auto;"
                                class="p-0 py-2 m-0">
                                <li class="nav-items mt-1 {{ empty(request('sport')) ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/trainers?{{ http_build_query(request()->except('sport', 'page')) }}">
                                        ALL TYPES
                                    </a>
                                </li>
                                @foreach ($sports as $sport)
                                    <li
                                        class="nav-items mt-1 {{ request('sport') && request('sport') == $sport->id ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?sport={{ $sport->id }}&{{ http_build_query(request()->except('sport', 'page')) }}">
                                            {{ Str::upper($sport->type) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            AGE
                        </div>
                        <div>
                            <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 1 && request('age-2') == 60 || (empty(request('age-1')) && empty(request('age-2'))) ? 'nav-items-active' : ''}}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/trainers?{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                        ALL
                                    </a>
                                </li>

                                <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 18 && request('age-2') == 25 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/trainers?age-1=18&age-2=25&{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                        18 - 25 YEARS OLD
                                    </a>
                                </li>
                                <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 26 && request('age-2') == 35 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1"
                                        href="/trainers?age-1=26&age-2=35&{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                        26 - 35 YEARS OLD
                                    </a>
                                </li>
                                <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 36 && request('age-2') == 45 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1"
                                        href="/trainers?age-1=36&age-2=45&{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                        36 - 45 YEARS OLD
                                    </a>
                                </li>
                                <li class="nav-items mt-1 {{ request('age-1') && request('age-2') && request('age-1') == 46 && request('age-2') == 80 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1"
                                        href="/trainers?age-1=46&age-2=80&{{ http_build_query(request()->except('age-1', 'age-2', 'page')) }}">
                                        ABOVE 46 YEARS OLD
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            EXPERIENCE
                        </div>
                        <div>
                            <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                <li
                                    class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 1 && request('ex-2') == 60 || (empty(request('ex-1')) && empty(request('ex-2'))) ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/trainers?{{ http_build_query(array_merge(request()->except('ex-1', 'ex-2', 'page'), ['ex-1' => 1, 'ex-2' => 60])) }}">
                                        ALL
                                    </a>
                                </li>

                                <li
                                    class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 1 && request('ex-2') == 2 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1"
                                        href="/trainers?ex-1=1&ex-2=2&{{ http_build_query(request()->except('ex-1', 'ex-2', 'page')) }}">
                                        1 - 2 YEARS
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 3 && request('ex-2') == 6 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/trainers?ex-1=3&ex-2=6&{{ http_build_query(request()->except('ex-1', 'ex-2', 'page')) }}">
                                        3 - 6 YEARS
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 7 && request('ex-2') == 9 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/trainers?ex-1=7&ex-2=9&{{ http_build_query(request()->except('ex-1', 'ex-2', 'page')) }}">
                                        7 - 9 YEARS
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('ex-1') && request('ex-2') && request('ex-1') == 10 && request('ex-2') == 40 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/trainers?ex-1=10&ex-2=40&{{ http_build_query(request()->except('ex-1', 'ex-2', 'page')) }}">
                                        ABOVE 10 YEARS
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            HOURLY_RATE
                        </div>
                        <div>
                            <ul style="border: 1px solid; border-radius: 5px;" class="p-0 py-2 m-0">
                                <li class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 1 && request('hour-2') == 3000 || (empty(request('hour-1')) && empty(request('hour-2'))) ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/trainers?{{ http_build_query(array_merge(request()->except('hour-1', 'hour-2', 'page'), ['hour-1' => 1, 'hour-2' => 3000])) }}">
                                        ALL
                                    </a>        
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 1 && request('hour-2') == 10 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/trainers?hour-1=1&hour-2=10&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                        UNDER $10
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 10 && request('hour-2') == 100 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/trainers?hour-1=10&hour-2=100&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                        $10 - $100
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 100 && request('hour-2') == 300 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/trainers?hour-1=100&hour-2=300&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                        $100 - $300
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 300 && request('hour-2') == 600 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/trainers?hour-1=300&hour-2=600&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                        $300 - $600
                                    </a>
                                </li>
                                <li
                                    class="nav-items mt-1 {{ request('hour-1') && request('hour-2') && request('hour-1') == 600 && request('hour-2') == 3000 ? 'nav-items-active' : '' }}">
                                    <a class="nav-link ps-2 py-1 "
                                        href="/trainers?hour-1=600&hour-2=3000&{{ http_build_query(request()->except('hour-1', 'hour-2', 'page')) }}">
                                        ABOVE $600 +
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2 fs-5 fw-medium">
                            REGION
                        </div>
                        <div>
                            <ul style="border: 1px solid; border-radius: 5px; max-height: 35vh; overflow-y: auto;" class="p-0 py-2 m-0">
                                <li class="nav-items mt-1 {{ empty(request('region')) ? 'nav-items-active' : '' }}">
                                    <a class="nav-link  ps-2 py-1 "
                                        href="/trainers?{{ http_build_query(request()->except('region', 'page')) }}">
                                        ALL REGIONS
                                    </a>
                                </li>
                                @foreach ($regions as $region)
                                    <li class="nav-items mt-1 {{ request('region') && request('region') == $region->id ? 'nav-items-active' : '' }}">
                                        <a class="nav-link  ps-2 py-1 "
                                            href="/trainers?region={{ $region->id }}&{{ http_build_query(request()->except('region', 'page')) }}">
                                            {{ Str::ucfirst($region->name) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- normal filter end --}}


            <div class="col-lg-9">

                <div class="container">
                    <div class="row mb-4">
                        <div class="fs-3 fw-semibold">
                        {{ $trainerscount->count() }} Results Found
                    </div>
                    </div>
                    <div class="row">
                        @if ($trainers->count() > 0)
                            @foreach ($trainers as $trainer)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div style="border: none;" class="card">
                                        <a href="/trainers/{{ $trainer->id }}/detail"
                                            style="overflow: hidden;">
                                            <img style="width: 100%; max-height: 400px; min-height: 400px; object-fit: cover; object-position: center; transition: ease-in all 0.3s;"
                                                src="/storage/uploads/{{ $trainer->image }}" class="trainer-image"
                                                alt="...">
                                        </a>
                                        <div class="">
                                            <h5 class="mt-3 p-0 fs-5 fw-semibold">{{ $trainer->name }}</h5>
                                            <div style="font-size: 14px;"><i class="fa-solid fa-dumbbell"></i>
                                                {{ $trainer->sport->type }} | <i class="fa-regular fa-clock"></i>
                                                {{ round($trainer->experience) }}+ years experience </div>
                                            <div style="font-size: 14px;" class="mb-2 pt-2">
                                                @if ($trainer->courses->count() > 0)
                                                    <i class="fa-solid fa-arrow-trend-up"></i>
                                                    {{ $trainer->courses->count() }}
                                                    courses |
                                                @endif

                                                <i class="fa-solid fa-money-check-dollar"></i>
                                                ${{ $trainer->hourly_rate }}
                                                Hourly_rate
                                            </div>

                                            <div class="d-flex me-3 mb-3">
                                                <div class="">

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
                                            </div>

                                                <div style="font-size: 14.5px;" class="ms-2">
                                                    {{ $trainer->trainerReviews->count() }} Ratings
                                                </div>
                                            </div>
                                            <div style="max-height: 50px; min-height: 50px;">
                                                {{ $trainer->description == null ? 'This trainer has not posted description yet . . .' : Str::words($trainer->description, 12) }}
                                            </div>
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
                            {{ $trainers->links() }}
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

</x-layout>
