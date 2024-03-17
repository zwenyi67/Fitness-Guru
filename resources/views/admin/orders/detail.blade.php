<x-admin-layout>


    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <a class="btn" onclick="window.history.back()">
                        <i style="font-size: 37px;"
                        class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Order Detail</h3>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <table style="width: 100%" id="orders" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th>UNIT PRICE</th>
                                    <th>Quantity</th>
                                    <th>TOTAL AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td>
                                            @php
                                                static $i = 0;
                                                $i++;
                                                echo $i;
                                            @endphp

                                        </td>
                                        <td><img style='width: 90px; height: 90px; object-fit: cover; object-position: center;'
                                                src="/uploads/{{ $product->image }}" alt=""></th>
                                        <td>{{ $product->name }}</td>
                                        <td><b> $ </b> {{ $product->price }} </td>
                                        <td>
                                            @php
                                                $quantity = '';
                                                $quantity .= $product->pivot->quantity . ', ';
                                                $quantity = rtrim($quantity, ', ');
                                            @endphp
                                            {{ $quantity }}
                                        </td>
                                        <td>
                                            <b> $ </b> {{ $product->price * $quantity }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-size: 20px;"> <b>Total Amount </b> </td>
                                    <td>
                                        @php $total = 0; @endphp
                                        @foreach ($order->products as $product)
                                            @php
                                                $quantity = '';
                                                $quantity .= $product->pivot->quantity . ', ';
                                                $quantity = rtrim($quantity, ', ');
                                                $total = $product->price * $quantity + $total;
                                            @endphp
                                        @endforeach
                                        <b style="font-size: 20px;"> $ {{ $total }}</b> 

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="container-fluid mt-5">
                        <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Detail Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-lg-6">

                                            <div class="mb-4">
                                                <label for="name" class="text-md-end">Order ID</label>
                                                <input disabled class="form-control" value="{{ $order->id }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="mb-4">
                                                <label for="name" class="text-md-end">Total Amount</label>
                                                <input disabled class="form-control" value="{{ $order->total }} $">
                                            </div>
                                        </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="name" class="text-md-end">Name</label>
                                                    <input disabled class="form-control" value="{{ $order->name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="name" class="text-md-end">Email</label>
                                                    <input disabled class="form-control" value="{{ $order->email }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="name" class="text-md-end">Phone</label>
                                                    <input disabled class="form-control" value="{{ $order->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="name" class="text-md-end">Order Date</label>
                                                    <input disabled class="form-control" value="{{ $order->created_at}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label for="name" class="text-md-end">Address Detail</label>
                                                    <input disabled class="form-control"
                                                        value="{{ $order->building }}, {{ $order->address }}, {{ $order->township }}, {{ $order->city }}, {{ $order->region }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label  for="name" class="text-md-end">Order Notes</label>
                                                    <textarea style="min-height: 100px;" disabled class="form-control"
                                                       >{{ $order->order_notes }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-admin-layout>
