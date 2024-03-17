<x-layout>

    <div class="container d-flex justify-content-center flex-column mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center">C A R T</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                    @include('user.products.quantity')
            </div>
        </div>
        
    </div>

    <script>
    $(document).on('click', '.removeProduct', function(a) {
    a.preventDefault();
    var item = $(this);

    Swal.fire({
        title: 'Do you want to remove this product?',
        showCancelButton: true,
        confirmButtonText: 'Remove',
        confirmButtonColor: 'red',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/products/cart/remove',
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: item.parents("tr").attr("rowId")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
        });
    });

    $(document).on('click', '.decrease', function (event) {
    event.preventDefault();

    var decrease = $(this);
    var rowId = decrease.parents("tr").attr("rowId");

    // Check if the button is disabled to prevent multiple clicks
    if (!decrease.hasClass('disabled')) {
        decrease.addClass('disabled');

        $.ajax({
            url: '/products/cart/decrease',
            type: 'PATCH',
            data: {
                _token: '{{ csrf_token() }}',
                id: rowId
            },
            success: function (response) {
                // window.location.reload();
                $('#quantity').html(response.quantity);
            },
            complete: function () {
                decrease.removeClass('disabled');
            }
        });
    }
}); 

$(document).on('click', '.increase', function (event) {
    event.preventDefault();

    var increase = $(this);
    var rowId = increase.parents("tr").attr("rowId");

    // Check if the button is disabled to prevent multiple clicks
    if (!increase.hasClass('disabled')) {
        increase.addClass('disabled');

        $.ajax({
            url: '/products/cart/increase',
            type: 'PATCH',
            data: {
                _token: '{{ csrf_token() }}',
                id: rowId
            },
            success: function (response) {
                // window.location.reload();
                $('#quantity').html(response.quantity);
            },
            complete: function () {
                increase.removeClass('disabled');
            }
        });
    }
}); 
    </script>


</x-layout>