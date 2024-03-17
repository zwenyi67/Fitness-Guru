<x-admin-layout>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title text-center mr-auto">Members Table </h3>
                </div>
                <div class="card-header navbar navbar-expand navbar-white navbar-light">
                    <ul class="navbar-nav d-flex">
                        <li class="nav-item d-none d-sm-inline-block border rounded mr-2">
                          <a href="/admin/members" class="nav-link px-3 ">Pending</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block border rounded">
                          <a href="#" class="nav-link px-3 text-primary">Approved</a>
                        </li>
                      </ul>
                </div>

                <div class="card-body">
                    <table style="width: 100%" id="members" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Date of Birth</th>
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
                url: '/admin/members/approve',
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
                    'data': 'birth_date'
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
            title: 'Are you sure you want to delete this book?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/books/delete/' + id,
                    type: 'DELETE',
                    success: function() {
                        bookTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Deleted!',
                        'Book has been deleted.',
                        'success'
                    )
            }
        })
    });
    </script>
</x-admin-layout>