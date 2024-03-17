<x-admin-layout>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title text-center mr-auto">Course Table </h3>
                </div>
                

                <div class="card-body">
                    <table style="width: 100%" id="courses" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Course</th>
                                <th>Trainer</th>
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
        var memberTable = $('#courses').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/courses',
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
                    "data": "trainer"
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
            title: 'Are you sure you want to delete this course?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/books/delete/' + id,
                    type: 'DELETE',
                    success: function() {
                        memberTable.ajax.reload();
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

    $(document).on('click', '.changeButton', function(a) {
        a.preventDefault();
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure you want to approve this course?',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            confirmButtonColor: 'blue',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/courses/' + id + '/approve',
                    type: 'PATCH',
                    success: function() {
                        memberTable.ajax.reload();
                    }
                });
                Swal.fire(
                        'Success !',
                        'Course has been approved.',
                        'success'
                    )
            }
        })
    });
    </script>
</x-admin-layout>