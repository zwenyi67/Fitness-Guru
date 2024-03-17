<x-admin-layout>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title text-center mr-auto mt-2">Topics Table </h3>
                    <a class="btn btn-primary p-2" href="/admin/topics/create">Add New Topic</a>
                </div>
                

                <div class="card-body">
                    <table style="width: 100%" id="topics" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
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
        var topicTable = $('#topics').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/topics',
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
                    'data': 'action'
                },
            ]
        });

        $(document).on('click', '.deleteButton', function(a) {
        a.preventDefault();
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure you want to delete this topic?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/topics/' + id +'/delete',
                    type: 'DELETE',
                    success: function() {
                        topicTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Deleted!',
                        'Topic has been deleted.',
                        'success'
                    )
            }
        })
    });

    
    </script>
</x-admin-layout>