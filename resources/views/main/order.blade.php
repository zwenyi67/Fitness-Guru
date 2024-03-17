<x-layout>

    <div style="padding-left: 20px; padding-right: 20px;" class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center">M Y &nbsp; O R D E R S</h1>
            </div>
        </div>
    </div>

    <div style="padding: 20px;" class="container mt-3">
        <div class="row">
            <div class="card py-4 px-2">
                <div style="background: none;" class="">
                    <div class="d-flex">
                        <div class="order-pad">
                            <a class="orderall fw-semibold {{ request('pending') || request('received') ? '' : 'orderactive' }}"
                                href="/order">ALL</a>
                        </div>
                        <div class="order-pad">
                            <a class="order fw-semibold {{ request('pending') ? 'orderactive' : '' }} px-4"
                                href="/order?pending=1">PENDING</a>
                        </div>
                        <div class="order-pad">
                            <a class="order fw-semibold {{ request('received') ? 'orderactive' : '' }} px-4"
                                href="/order?received=1">RECEIVED</a>
                        </div>
                    </div>
                </div>
                <hr>

                {{-- all order section --}}

                <div class="card-body tab {{ request('pending') || request('received') ? '' : 'active' }}">
                    <div class="fs-4 mt-5 mb-4 fw-medium">
                        ALL ORDERS
                    </div>
                    @if ($orders->count() == 0)
                        <div class="d-flex flex-column align-items-center justify-content-center text-danger">
                            <div class="fs-5 fw-medium">There are no orders placed yet.</div>
                            <a href="/products" class="checkout mt-4 mb-2 px-3 py-2 fw-semibold">CONTINUE SHOPPING</a>
                        </div>
                    @else
                        <div class="table-responsive-sm">

                            @foreach ($orders as $order)
                                <div class="card mb-3">

                                    <div class="card-header">
                                        @php
                                            static $i;
                                            $i++;
                                        @endphp
                                        {{ $i }}. &nbsp;
                                        ORDER INFORMATION
                                    </div>
                                    <div class="card-body p-3 py-4">
                                        <div class="row mb-4">
                                            <div class="col-lg-4">
                                                <div>
                                                    <label style="font-size: 12px;" class="pb-1"
                                                        for="">NAME</label>
                                                    <input class="form-control" disabled type="text"
                                                        value="{{ $order->name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <label style="font-size: 12px;" class="pb-1"
                                                        for="">CONTACT</label>
                                                    <input class="form-control" disabled type="text"
                                                        value="{{ $order->email }}, {{ $order->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <label style="font-size: 12px;" class="pb-1" for="">ORDER
                                                        DATE</label>
                                                    <input class="form-control" disabled type="text"
                                                        value="{{ $order->created_at }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div>
                                                    <label style="font-size: 12px;" class="pb-1"
                                                        for="">ADDRESS</label>
                                                    <input class="form-control" disabled type="text"
                                                        value="{{ $order->building }}, {{ $order->address }}, {{ $order->township }}, {{ $order->city }}, {{ $order->region }}.">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label style="font-size: 12px;" class="pb-1" for="">ORDER
                                                        NOTES</label>
                                                    <input class="form-control" disabled type="text"
                                                        value="{{ $order->order_notes }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table style="width: 100%; border: 1px solid #dbe0e7;" id="cart"
                                    class="table mb-5">
                                    <thead class="table-light pb-2 py-3" style="height: 55px;">
                                        <tr align="center">
                                            <th></th>
                                            <th class="pb-3">PRODUCT</th>
                                            <th class="pb-3">BRAND</th>
                                            <th class="pb-3">CATEGORY</th>
                                            <th class="pb-3">PRICE</th>
                                            <th class="pb-3">QUANTITY</th>
                                            <th class="pb-3"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->products as $product)
                                            <tr align="center">

                                                <td>
                                                    <img src="/uploads/{{ $product->image }}"
                                                        class="card-img-top product-img" alt="wait">
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center pt-4">
                                                        <a class="text-black"
                                                            href="/products/{{ $product->id }}/detail">
                                                            {{ $product->name }} </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center pt-4">
                                                        {{ $product->brand }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center pt-4">
                                                        {{ $product->category->name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center pt-4">
                                                        {{ $product->price }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center pt-4">
                                                        @php
                                                            $quantity = '';
                                                            $quantity .= $product->pivot->quantity . ', ';
                                                            $quantity = rtrim($quantity, ', ');
                                                        @endphp
                                                        {{ $quantity }}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr align="center">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="pb-4">
                                                <div
                                                    class="d-flex fw-medium flex-column justify-content-center align-items-center pt-4">
                                                    TOTAL AMOUNT
                                                </div>
                                            </td>
                                            <td class="pb-4">
                                                <div
                                                class="d-flex fw-medium flex-column justify-content-center align-items-center pt-4">
                                               @php
                                                $total = [];
                                                   foreach  ($order->products as $product) {
                                                    $total[] = $product->pivot->quantity * $product->price;
                                                   }
                                                   $totalAmount = array_sum($total);
                                                   echo $totalAmount;
                                               @endphp
                                            </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <hr>
                                <hr class="mb-5">
                            @endforeach
                   


                </div>
                @endif
            </div>

            {{-- Pending order section --}}


            <div class="card-body tab {{ request('pending') ? 'active' : '' }}">
                <div class="fs-4 mt-5 mb-4 fw-medium">
                    PENDING ORDERS
                </div>
                @if ($pendings->count() == 0)
                    <div class="d-flex flex-column align-items-center justify-content-center text-danger">
                        <div class="fs-5 fw-medium">There are no orders placed yet.</div>
                        <a href="/products" class="checkout mt-4 mb-2 px-3 py-2 fw-semibold">CONTINUE SHOPPING</a>
                    </div>
                @else
                    <div class="table-responsive-sm">
                                      
                        @foreach ($pendings as $order)

                            <div class="card mb-3">

                                @if ($order->status === 1)
                                    <div class="alert alert-warning text-danger">
                                        This Product will be delivered soon, and cannot be cancelled!
                                    </div>
                                @else
                                    <div class="alert alert-secondary text-danger cancel">
                                        <div class="pt-3 me-4">You can cancel this order and products before delivery!
                                        </div>
                                        <a class="btn btn-danger px-4 fw-medium cancelButton mt-2"
                                            data-id="{{ $order->id }}" href="">Cancel</a>
                                    </div>
                                @endif

                                <div class="card-header">
                                    @php
                                        static $j;
                                        $j++;
                                    @endphp
                                    {{ $j }}. &nbsp;
                                    ORDER INFORMATION
                                </div>
                                <div class="card-body p-3 py-4">
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <div>
                                                <label style="font-size: 12px;" class="pb-1"
                                                    for="">NAME</label>
                                                <input class="form-control" disabled type="text"
                                                    value="{{ $order->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label style="font-size: 12px;" class="pb-1"
                                                    for="">CONTACT</label>
                                                <input class="form-control" disabled type="text"
                                                    value="{{ $order->email }}, {{ $order->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label style="font-size: 12px;" class="pb-1" for="">ORDER
                                                    DATE</label>
                                                <input class="form-control" disabled type="text"
                                                    value="{{ $order->created_at }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <div>
                                                <label style="font-size: 12px;" class="pb-1"
                                                    for="">ADDRESS</label>
                                                <input class="form-control" disabled type="text"
                                                    value="{{ $order->building }}, {{ $order->address }}, {{ $order->township }}, {{ $order->city }}, {{ $order->region }}.">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <label style="font-size: 12px;" class="pb-1" for="">ORDER
                                                    NOTES</label>
                                                <input class="form-control" disabled type="text"
                                                    value="{{ $order->order_notes }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table style="width: 100%; border: 1px solid #dbe0e7;" id="cart" class="table mb-5">
                                <thead class="table-light pb-2 py-3" style="height: 55px;">
                                    <tr align="center">
                                        @if ($order->status != 1)
                                            <th class="pb-5"></th>
                                        @endif
                                        <th></th>
                                        <th class="pb-3">PRODUCT</th>
                                        <th class="pb-3">BRAND</th>
                                        <th class="pb-3">CATEGORY</th>
                                        <th class="pb-3">PRICE</th>
                                        <th class="pb-3">QUANTITY</th>
                                        <th class="pb-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($order->products as $product)
                                        <tr align="center">
                                            @if ($order->status != 1)
                                                <td>
                                                    <a href="" class="rm-product removeProduct" data-ids="{{ $product->id }},{{ $order->id }}">
                                                        <i class="fa-regular fa-circle-xmark fs-2 pt-4"></i>
                                                    </a>
                                                </td>
                                            @endif
                                            <td>
                                                <img src="/uploads/{{ $product->image }}"
                                                    class="card-img-top product-img" alt="wait">
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-center align-items-center pt-4">
                                                    {{ $product->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center pt-4">
                                                    {{ $product->brand }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center pt-4">
                                                    {{ $product->category->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center pt-4">
                                                    {{ $product->price }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center pt-4">
                                                    @php
                                                        $quantity = '';
                                                        $quantity .= $product->pivot->quantity . ', ';
                                                        $quantity = rtrim($quantity, ', ');
                                                    @endphp
                                                    {{ $quantity }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr align="center">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="pb-4">
                                            <div
                                                class="d-flex fw-medium flex-column justify-content-center align-items-center pt-4">
                                                TOTAL AMOUNT
                                            </div>
                                        </td>
                                        <td class="pb-4">
                                            <div
                                                class="d-flex fw-medium flex-column justify-content-center align-items-center pt-4">
                                               @php
                                                $total = [];
                                                   foreach  ($order->products as $product) {
                                                    $total[] = $product->pivot->quantity * $product->price;
                                                   }
                                                   $totalAmount = array_sum($total);
                                                   echo $totalAmount;
                                               @endphp
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <hr>
                            <hr class="mb-5">
                        @endforeach

            </div>
            @endif

        </div>

        {{-- Received order section --}}

        <div class="card-body tab {{ request('received') ? 'active' : '' }}">
            <div class="fs-4 mt-5 mb-4 fw-medium">
                RECEIVED ORDERS
            </div>
            @if ($receives->count() == 0)
                    <div class="d-flex flex-column align-items-center justify-content-center text-danger">
                        <div class="fs-5 fw-medium">There are no orders placed yet.</div>
                        <a href="/products" class="checkout mt-4 mb-2 px-3 py-2 fw-semibold">CONTINUE SHOPPING</a>
                    </div>
                    @else


                <div class="table-responsive-sm">
                    @foreach ($receives as $order)
                        <div class="card mb-3">

                            <div class="card-header">
                                @php
                                    static $k;
                                    $k++;
                                @endphp
                                {{ $k }}. &nbsp;
                                ORDER INFORMATION
                            </div>
                            <div class="card-body p-3 py-4">
                                <div class="row mb-4">
                                    <div class="col-lg-4">
                                        <div>
                                            <label style="font-size: 12px;" class="pb-1"
                                                for="">NAME</label>
                                            <input class="form-control" disabled type="text"
                                                value="{{ $order->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label style="font-size: 12px;" class="pb-1"
                                                for="">CONTACT</label>
                                            <input class="form-control" disabled type="text"
                                                value="{{ $order->email }}, {{ $order->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label style="font-size: 12px;" class="pb-1" for="">ORDER
                                                DATE</label>
                                            <input class="form-control" disabled type="text"
                                                value="{{ $order->created_at }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div>
                                            <label style="font-size: 12px;" class="pb-1"
                                                for="">ADDRESS</label>
                                            <input class="form-control" disabled type="text"
                                                value="{{ $order->building }}, {{ $order->address }}, {{ $order->township }}, {{ $order->city }}, {{ $order->region }}.">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label style="font-size: 12px;" class="pb-1" for="">ORDER
                                                NOTES</label>
                                            <input class="form-control" disabled type="text"
                                                value="{{ $order->order_notes }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table style="width: 100%; border: 1px solid #dbe0e7;" id="cart" class="table mb-5">
                            <thead class="table-light pb-2 py-3" style="height: 55px;">
                                <tr align="center">
                                    <th></th>
                                    <th class="pb-3">PRODUCT</th>
                                    <th class="pb-3">BRAND</th>
                                    <th class="pb-3">CATEGORY</th>
                                    <th class="pb-3">PRICE</th>
                                    <th class="pb-3">QUANTITY</th>
                                    <th class="pb-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                    <tr align="center">

                                        <td>
                                            <img src="/uploads/{{ $product->image }}"
                                                class="card-img-top product-img" alt="wait">
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                {{ $product->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                {{ $product->brand }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                {{ $product->category->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                {{ $product->price }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center pt-4">
                                                @php
                                                    $quantity = '';
                                                    $quantity .= $product->pivot->quantity . ', ';
                                                    $quantity = rtrim($quantity, ', ');
                                                @endphp
                                                {{ $quantity }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr align="center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="pb-4">
                                        <div
                                            class="d-flex fw-medium flex-column justify-content-center align-items-center pt-4">
                                            TOTAL AMOUNT
                                        </div>
                                    </td>
                                    <td class="pb-4">
                                        <div
                                                class="d-flex fw-medium flex-column justify-content-center align-items-center pt-4">
                                               @php
                                                $total = [];
                                                   foreach  ($order->products as $product) {
                                                    $total[] = $product->pivot->quantity * $product->price;
                                                   }
                                                   $totalAmount = array_sum($total);
                                                   echo $totalAmount;
                                               @endphp
                                            </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <hr>
                        <hr class="mb-5">
                    @endforeach
                    
                </div>
                
                @endif
           

        </div>


    </div>
    </div>
    </div>


    <script>
        $(document).on('click', '.cancelButton', function(a) {
            a.preventDefault();
            var id = $(this).data('id');


            Swal.fire({
                title: 'Are you sure you want to cancel this order ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/order/' + id + '/delete',
                        type: 'DELETE',
                        success: function() {
                            window.location.reload();
                        }
                    });
                    Swal.fire(
                        'Deleted!',
                        'Order has been cancelled.',
                        'success'
                    )
                }
            });
        });

        $(document).on('click', '.removeProduct', function(a) {
    a.preventDefault();
    var ids = $(this).data('ids').split(','); // or any other delimiter
    var product_id = ids[0];
    console.log(product_id);
    var order_id = ids[1];
    console.log(order_id);


            Swal.fire({
                title: 'Are you sure you want to cancel this product?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/order/' +  order_id +'/product/' + product_id + '/delete',
                        type: 'DELETE',
                        success: function() {
                            window.location.reload();
                        }
                    });
                    
                }
            });
        });
    </script>



</x-layout>
