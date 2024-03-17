<x-layout>


    <div class="container d-flex justify-content-center flex-column mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center">W I S H L I S T</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="table-responsive-sm">
                    <table id="cartTable" class="table table-bordered" style="width: 100%;">
                        <thead class="table-light pb-2 py-3" style="height: 55px;">
                            <tr align="center">
                                <th class="pb-5"></th>
                                <th></th>
                                <th class="pb-3">PRODUCT</th>
                                <th class="pb-3">PRICE</th>
                                <th class="pb-3">Date ADDED</th>
                                <th class="pb-3"></th>
                            </tr>
                        </thead>
                        <tbody class="p-2">
                            @if($wishes->count() == 0)
                              <tr align="center" class="p-5">
                                <td colspan="5" class="text-danger p-5 fs-5 fw-semibold">
                                    NO PRODUCT IN YOUT WISHLIST !
                              </tr>
                            @else
                            @foreach ($wishes as $wish)
                                <tr align="center">
                                    <td>
                                        <a href="" class="rm-product removeWish"
                                            data-id="{{ $wish->product->id }}">
                                            <i class="fa-regular fa-circle-xmark fs-2 pt-4"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <img src="/uploads/{{ $wish->product->image }}" class="card-img-top product-img"
                                            alt="">
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center pt-4">
                                            {{ $wish->product->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center pt-4">
                                            ${{ $wish->product->price }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center pt-4">
                                            {{ $wish->created_at }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center pt-3">
                                            <a href="" class="btn btn-primary addToCart" data-id="{{ $wish->product->id }}" >ADD TO CART</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
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
