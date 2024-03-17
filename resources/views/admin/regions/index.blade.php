<x-admin-layout>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title text-center mr-auto mt-2">Regions Table </h3>
                    <a class="btn btn-primary p-2" href="/admin/regions/create">Add New Region</a>
                </div>
                

                <div class="card-body">
                    <table style="width: 100%" id="regions" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
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
        var topicTable = $('#regions').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/regions',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [
                {
                    "data": "no"
                },
                {
                    "data": "price"
                },
                {
                    "data": "name"
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
            title: 'Are you sure you want to delete this region?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/regions/' + id +'/delete',
                    type: 'DELETE',
                    success: function() {
                        topicTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Deleted!',
                        'Region has been deleted.',
                        'success'
                    )
            }
        })
    });

    
    </script>
</x-admin-layout>