<div id="quantity" class="table-responsive-sm">
    <table id="cartTable" style="width: 100%;" id="cart" class="table table-bordered">
        <thead class="table-light pb-2 py-3" style="height: 55px;">
            <tr align="center">
                <th class="pb-5"></th>
                <th></th>
                <th class="pb-3">PRODUCT</th>
                <th class="pb-3">PRICE</th>
                <th class="pb-3">QUANTITY</th>
                <th class="pb-3">SUBTOTAL</th>       
            </tr>       
        </thead>
        <tbody class="p-2">
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    <tr rowId="{{ $id }}" align="center">
                        <td data-th="">
                            <a href="" class="rm-product removeProduct">
                                <i class="fa-regular fa-circle-xmark fs-2 pt-4"></i>
                            </a>
                        </td>
                        <td data-th="">
                            <img src="/uploads/{{ $details['image'] }}" class="card-img-top product-img" alt="">
                        </td>
                        <td data-th="PRODUCT" align="center">
                            <div class="d-flex justify-content-center align-items-center pt-4">
                                {{ $details['name'] }}
                            </div>
                        </td>
                        <td data-th="PRICE">
                            <div class="d-flex justify-content-center align-items-center pt-4">
                                ${{ $details['price'] }}
                            </div>
                        </td>
                        <td data-th="QUANTITY">
                            <div class="d-flex justify-content-center align-items-center pt-3">
                                <a class="border p-2 px-2 text-black decrease" href=""><i
                                        class="fa-solid fa-minus"></i></a>
                                <div class="border p-2 px-3">{{ $details['quantity'] }}</div>
                                <a class="border p-2 px-2 text-black increase" href=""><i
                                        class="fa-solid fa-plus"></i></a>
                            </div>
                        </td>
                        <td data-th="SUBTOTAL">
                            <div class="d-flex justify-content-center align-items-center pt-4">
                                ${{ $details['price'] * $details['quantity'] }}
                            </div>
                        </td>
                    </tr>
                @endforeach
                @php
                    $total = [];
                @endphp

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="pb-4"><div class="d-flex justify-content-center align-items-center pt-4">
                       <Strong class="fs-5"> TOTAL AMOUNT </Strong>
                    </div></td>
                    <td data-th="SUBTOTAL">
                        <div class="d-flex flex-column justify-content-center align-items-center pt-4">
                            @foreach (session('cart') as $id => $details)
                                @php
                                    $total[] = $details['price'] * $details['quantity'];
                                @endphp
                            @endforeach

                            @php
                                $totalAmount = array_sum($total);
                            @endphp

                            <strong class="mb-5 fs-5"> ${{ $totalAmount }}</strong>

                            <a href="/products/cart/checkout" class="checkout mt-5 mb-4 px-3 py-3 fw-semibold">PROCEED TO CHECKOUT</a>
                        </div>
                    </td>
                </tr>

                @else

                <tr>
                    <td align="center" colspan="6" class="pt-5 pb-5">
                        <div class="d-flex flex-column">
                   <Strong class="fs-5 text-danger mb-3"> THERE ARE NO ITEMS IN YOUR CART  </Strong>
                   <div class="pt-5">
                    <a href="/products" class="checkout px-3 py-3 fw-semibold">CONTINUE SHOPPING</a>
                </div>
                </div>
                </td>
                </tr>
                

            @endif
            
        </tbody>
    </table>
</div>
