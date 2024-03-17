<x-layout>

    <div style="padding-left: 20px; padding-right: 20px; height: 100%; min-height: 100vh;" class="container mt-5">
        <div class="container mb-3">

            <div class="row">
                <div class="container ">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h5 class="card-title me-auto pt-2">Registration</h5>
                        </div>

                        <div class="card-body">
                            <table style="margin-top: 15px; border-top: 1px solid rgb(220, 213, 213); width: 100%;" id="example2"
                                class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="py-3">NO</th>
                                        <th class="py-3">NAME</th>
                                        <th class="py-3">EMAIL</th>
                                        <th class="py-3">PHONE</th>
                                        <th class="py-3">MESSAGE</th>
                                        <th class="px-4 py-3">SEND_DATE</th>
                                        <th class="py-3">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td align="center" class="py-4">{{ $i++ }}</td>
                                            <td class="py-4">{{ $message->name }}</td>
                                            <td class="py-4">{{ $message->email }}</td>
                                            <td class="py-4">{{ $message->phone }}</td>
                                            <td class="py-4">{{ $message->message }}</td>
                                            <td align="center" class="py-4">{{ $message->created_at->diffForHumans() }}</td>
                                            <td class="d-flex justify-content-center py-3">
                                                <div class="me-4">
                                                    <a class="btn btn-primary" href="">REPLIED</a>
                                                </div>
                                                <div>
                                                    <a class="btn btn-danger remove" data-id="{{ $message->id }}" href="">REMOVE</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.remove', function(a) {
            a.preventDefault();
            var id = $(this).data('id');


            Swal.fire({
                title: 'Are you sure you want to delete this message?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/trainer/courses/messages/'+ id +'/remove',
                        type: 'DELETE',
                        success: function(response) {
                            window.location.reload();
                          
                        }
                    });
                }
            });
        });
    </script>

</x-layout>
