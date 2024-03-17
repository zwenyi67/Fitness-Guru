<x-admin-layout>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title text-center mr-auto">Users Table </h3>
                </div>

                <div class="card-body">
                    <table style="width: 100%" id="members" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
        var memberTable = $('#members').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/members',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [
                {
                    "data": "no"
                },
                {
                    "data": "image"
                },
                {
                    "data": "name"
                },
                {
                    'data': 'email'
                },
                {
                    'data': 'phone'
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
            title: 'Are you sure you want to delete this user?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/members/' + id + '/delete',
                    type: 'DELETE',
                    success: function() {
                        memberTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    )
            }
        })
    });

    $(document).on('click', '.changeButton', function(a) {
        a.preventDefault();
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure you want to approve this member?',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            confirmButtonColor: 'blue',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/members/' + id + '/approve',
                    type: 'PATCH',
                    success: function() {
                        memberTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Success !',
                        'Member has been approved.',
                        'success'
                    )
            }
        })
    });
    </script>
</x-admin-layout>