<div class="container-fluid shop-nav">
    <div class="row p-3 py-4">
        <div class="col-lg-2 col-md-12">
            
        </div>
        <div  class="col-lg-1 col-md-12 ">
            <div class="container mt-4 ">
                    <div style="padding-top: 15px;" class="dropdown mb-3">
                            <a
                        class="dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ request('category') ? $categories->find(request('category'))->name : 'Categories' }}
                        </a>
                        <ul class="dropdown-menu" style="max-height: 300px; overflow-y: auto;">
                            <li>
                                <a class="dropdown-item  mt-2 {{ empty(request('category')) ? 'active' : '' }}"
                                    href="/products?{{ http_build_query(request()->except('category', 'page')) }}#foryou">
                                    Categories
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item  mt-2 {{ request('category') && request('category') == $category->id ? 'active' : '' }}"
                                        href="/products?category={{ $category->id }}&{{ http_build_query(request()->except('category', 'page')) }}#foryou">
                                        {{ $category->name }}
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
                    <form method="GET" action="/products/#foryou" class="input-group input-group-lg">
                    @if (request('category'))
                                        <input type="hidden" name="category" value="{{ request('category') }}">
                                    @endif
                                    @if (request('author'))
                                        <input type="hidden" name="author" value="{{ request('author') }}">
                                    @endif
                                    @if (request('price'))
                                        <input type="hidden" name="price" value="{{ request('price') }}">
                                    @endif
                                    <input type="text" name="search" placeholder="Search Product By Name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                                        class="form-control" style=""
                                        value="{{ request('search') }}">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                    </form>
                  </div>
            </div>
        </div>
        <div class="col-lg-1">
            
        </div>
        <div class="col-lg-2 col-md-12">
            <div class="container pt-3 pb-1" style="">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="p-1" style="">
                        <a href="/products/cart" class="fs-1 position-relative cart-btn"  href="">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <span style="border-radius: 50%; padding-top: 8px; padding-bottom: 9px; padding-right: 8px; background-color: #cb8f00;" 
                        class="badge position-absolute top-1 end-1">
                            {{-- {{count((array) session('cart'))}} --}}
                            @php
                                $total = [];    
                            @endphp
    
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php
                                        $total[] = $details['quantity'];
                                    @endphp
                                @endforeach
    
                                @php
                                    $totalQ = array_sum($total);
                                @endphp
    
                                {{ $totalQ }}
                            @else
                                0
                            @endif
                        </span>
                    </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="text-white pt-2">Shopping cart</div>
                            @php
                                $total = [];    
                            @endphp
    
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php
                                        $total[] = $details['quantity']*$details['price'];
                                    @endphp
                                @endforeach
    
                                @php
                                    $totalQ = array_sum($total);
                                @endphp
    
                            <div class="text-white">Total : ${{ $totalQ }}</div>
                            @else
                            <div class="text-white">Total : $0</div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12">

        </div>
    </div>
</div>