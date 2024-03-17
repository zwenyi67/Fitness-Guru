<x-admin-layout>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title text-center mr-auto">Orders Table </h3>
                </div>
                <div class="card-header navbar navbar-expand navbar-white navbar-light">
                    <ul class="navbar-nav d-flex">
                        <li class="nav-item d-none d-sm-inline-block border rounded mr-2">
                          <a href="/admin/orders/" class="nav-link px-3 ">Orders</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block border rounded mr-2">
                          <a href="#" class="nav-link px-3 text-primary">Add Delivery</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block border rounded">
                            <a href="/admin/orders/delivered" class="nav-link px-3 ">Delivered</a>
                          </li>
                      </ul>
                </div>
                

                <div class="card-body">
                    <table style="width: 100%" id="orders" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->



    <script>
        var orderTable = $('#orders').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/orders/adddelivery',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [
                {
                    "data": "no"
                },
                {
                    "data": "name"
                },
                {
                    'data': 'contact'
                },
                {
                    'data': 'address'
                },
                {
                    'data': 'action'
                },
            ]
        });

        $(document).on('click', '.deleteButton', function(a) {
        a.preventDefault();
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure you want to delete this order?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/orders/' + id + '/delete',
                    type: 'DELETE',
                    success: function() {
                        orderTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Deleted!',
                        'Order has been deleted.',
                        'success'
                    )
            }
        })
    });

    $(document).on('click', '.deliverButton', function(a) {
        a.preventDefault();
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure this order is delivered to customer ?',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            confirmButtonColor: 'blue',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/orders/' + id + '/deliver',
                    type: 'PATCH',
                    success: function() {
                        orderTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Success !',
                        'Order has been delivered.',
                        'success'
                    )
            }
        })
    });
    </script>
</x-admin-layout>