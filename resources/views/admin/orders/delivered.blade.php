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
                          <a href="/admin/orders" class="nav-link px-3 ">Orders</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block border rounded mr-2">
                          <a href="/admin/orders/adddelivery" class="nav-link px-3 ">Add Delivery</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block border rounded">
                            <a href="#" class="nav-link px-3 text-primary">Delivered</a>
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
        var trainerTable = $('#orders').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/orders/delivered',
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
            title: 'Are you sure you want to delete this order history?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/orders/' + id + '/delete',
                    type: 'DELETE',
                    success: function() {
                        trainerTable.ajax.reload();
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

    $(document).on('click', '.changeButton', function(a) {
        a.preventDefault();
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure you want to approve this trainer?',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            confirmButtonColor: 'blue',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/trainers/' + id + '/approve',
                    type: 'PATCH',
                    success: function() {
                        trainerTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Success !',
                        'trainer has been approved.',
                        'success'
                    )
            }
        })
    });
    </script>
</x-admin-layout>