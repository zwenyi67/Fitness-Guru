    <x-layout>

        <div style=""  class="container d-flex justify-content-center flex-column mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h1 align="center">C H E C K O U T</h1>
                </div>
            </div>
            <div class="row">
                <form action="/products/cart/checkout" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 mt-sm-5">
                                <div class="card p-3 py-4">
                                    <div class="container pt-3">
                                        <div class="row">
                                            <div>
                                                BILLING DETAILS
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-4">
                                                    <label for="email" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">Email</label>

                                                    <input id="email" type="text"
                                                        class="form-control py-2 @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" placeholder="Enter your email"
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-4">
                                                    <label for="name" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">Name</label>

                                                    <input id="name" type="text"
                                                        class="form-control py-2 @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" placeholder="Enter your name"
                                                        autocomplete="name">

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-4">
                                                    <label for="phone" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">Phone</label>

                                                    <input id="phone" type="text"
                                                        class="form-control py-2 @error('phone') is-invalid @enderror"
                                                        name="phone" value="{{ old('phone') }}" placeholder="Enter your phone"
                                                        autocomplete="phone">

                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-4">
                                                    <label for="region" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">Region</label>

                                                    <input id="region" type="text"
                                                        class="form-control py-2 @error('region') is-invalid @enderror"
                                                        name="region" value="{{ old('region') }}" placeholder="Enter your region"
                                                        autocomplete="region">

                                                    @error('region')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-4">
                                                    <label for="city" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">City</label>

                                                    <input id="city" type="text"
                                                        class="form-control py-2 @error('city') is-invalid @enderror"
                                                        name="city" value="{{ old('city') }}" placeholder="Enter your city"
                                                        autocomplete="city">

                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-4">
                                                    <label for="township" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">Township</label>

                                                    <input id="township" type="text"
                                                        class="form-control py-2 @error('township') is-invalid @enderror"
                                                        name="township" value="{{ old('township') }}" placeholder="Enter your township"
                                                        autocomplete="township">

                                                    @error('township')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-4">
                                                    <label for="address" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">Address</label>

                                                    <input id="address" type="text"
                                                        class="form-control py-2 @error('address') is-invalid @enderror"
                                                        name="address" value="{{ old('address') }}" placeholder="Ward & Street name"
                                                        autocomplete="address">

                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="mb-4">
                                                    <label for="building" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">Building</label>

                                                    <input id="building" type="text"
                                                        class="form-control py-2 @error('building') is-invalid @enderror"
                                                        name="building" value="{{ old('name') }}" placeholder="Apartment & House No"
                                                        autocomplete="building">

                                                    @error('building')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label for="order_notes" style="font-size: 14px; color: rgb(123, 118, 118);"
                                                        class="text-md-end pb-2">Orders Note (Optional)</label>

                                                    <textarea id="order_notes" type="text" style="min-height: 120px;"
                                                        class="form-control py-2 @error('order_notes') is-invalid @enderror"
                                                        name="order_notes" value="{{ old('order_notes') }}" required placeholder="Notes about your order, e.g. special notes for delivery."
                                                        autocomplete="order_notes"></textarea>

                                                    @error('order_notes')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-sm-5">
                                <div class="card p-3 py-4">
                                    <div class="container pt-3">
                                        <div class="row">
                                            <div>
                                                YOUR ORDER
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-4">
                                            <div class="">
                                                <table class="table border bg-primary">
                                                    <thead>
                                                        <tr align="left" >
                                                            <th class="p-3 py-4">PRODUCT</th>
                                                            <th class="p-3 py-4">SUBTOTAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (session('cart'))
                                                            @foreach (session('cart') as $id => $details)
                                                                <tr align="left">
                                                                    <td class="p-3 py-4">{{ $details['name'] }} <strong> x
                                                                        {{ $details['quantity'] }} </strong></td>
                                                                    <td class="p-3 py-4">{{ $details['price'] * $details['quantity'] }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                        @php
                                                            $total = [];
                                                        @endphp
                                                        <tr>
                                                            <th class="p-3 py-4">Subtotal</th>
                                                            @foreach (session('cart') as $id => $details)
                                                                @php
                                                                    $total[] = $details['price'] * $details['quantity'];
                                                                @endphp
                                                            @endforeach

                                                            @php
                                                                $totalAmount = array_sum($total);
                                                            @endphp
                                                            <td class="p-3 py-4">${{ $totalAmount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="p-3 py-4">Shipping</th>
                                                            <td class="p-3 py-4">Free Shipping</td>
                                                        </tr>
                                                        @php
                                                            $total = [];
                                                        @endphp
                                                        <tr>
                                                            <th class="p-3 py-4">Total Amount</th>
                                                            @foreach (session('cart') as $id => $details)
                                                                @php
                                                                    $total[] = $details['price'] * $details['quantity'];
                                                                @endphp
                                                            @endforeach

                                                            @php
                                                                $totalAmount = array_sum($total);
                                                            @endphp
                                                            <td class="p-3 py-4">${{ $totalAmount }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <input type="hidden" name="total" value="{{$totalAmount}}">
                                        <div style="padding-left: 12px; padding-right: 12px;" class="row mt-3">
                                            <button class="py-3">
                                                PLACE ORDER
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </x-layout>
