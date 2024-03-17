<x-admin-layout>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title text-center mr-auto mt-2">Blog Table </h3>
                    <a class="btn btn-primary p-2" href="/admin/blogs/create">Create Blog</a>
                </div>

                <div class="card-body">
                    <table style="width: 100%" id="blogs" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
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
        var blogTable = $('#blogs').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/blogs',
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
                    "data": "title"
                },
                {
                    "data": "content"
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
            title: 'Are you sure you want to delete this blog?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/blogs/' + id + '/delete',
                    type: 'DELETE',
                    success: function() {
                        blogTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Deleted!',
                        'Blog has been deleted.',
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
                        blogTable.ajax.reload();
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