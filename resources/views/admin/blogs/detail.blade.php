<x-admin-layout>


    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="#" onclick="history.back()">
                        <i style="font-size: 37px;" class="fas fa-chevron-circle-left"></i>
                    </a>
                    <h3 style="font-size: 22px;" class="card-title text-center mr-auto ml-3 pt-1">Detail</h3>
                </div>

                <div class="card-body">

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-8">
                                    <div style="max-height: 450px; overflow: hidden;">
                                        <img style="max-height: 450px; object-fit: cover; object-position: center;"
                                            class="card-img-top" src="/uploads/{{ $blog->image }}" alt="">
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-1 mt-4">
                                            <h3 class="mr-auto">{{ $blog->title }}</h3>
                                            

                                            

                                        </div>
                                        <div style="color: rgb(109, 105, 105);" class="d-flex mb-3">
                                            <div class="d-flex mr-3">
                                                <i style="padding-top: 2px; font-size: 12px;"
                                                    class="fas fa-user-secret mr-1"></i>
                                                <span style="font-size: 12px;">ADMIN</span>
                                            </div>
                                            <div class="d-flex mr-3">
                                                <i style="padding-top: 3px; font-size: 12px;"
                                                    class="far fa-heart mr-1"></i>
                                                <span style="font-size: 12px;">{{ $blog->likes->count() }}</span>
                                            </div>
                                            <div class="d-flex mr-3">
                                                <i style="padding-top: 3px; font-size: 12px;"
                                                    class="far fa-comment mr-1"></i>
                                                <span style="font-size: 12px;">{{ $blog->comments->count() }}</span>
                                            </div>
                                            <div class="d-flex mr-3">
                                                <i style="padding-top: 2px; font-size: 12px;"
                                                    class="fas fa-calendar-alt mr-1"></i>
                                                <span
                                                    style="font-size: 12px;">{{ $blog->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <p style="line-height: 28px; color:rgb(109, 105, 105)" class="">
                                            {{ $blog->content }}</p>
                                    </div>
                                    
                                    <div class="mt-5 pb-3">
                                        <h5 id="comment" class="card-title">COMMENTS</h5>
                                    </div>
                                    
                                    <hr>

                                    @include('admin.blogs.comment')

                            </div>
                            <div class="col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        

        $(document).on('click', '.blogDelete', function(a) {
            a.preventDefault();
            var id = $(this).data('id');


            Swal.fire({
                title: 'Are you sure you want to delete this blog?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/blogs/' + id + '/delete',
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success',
                                }).then(() => {
                                    // Redirect to /blogs after displaying the success message
                                    window.location.href = '/blogs';
                                });
                            } else {
                                // Handle other scenarios or errors
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Unable to delete the blog.',
                                    icon: 'error',
                                });
                            }
                        }
                    });
                }
            });
        });


        $(document).on('click', '.commentDelete', function(a) {
            a.preventDefault();
            var id = $(this).data('id');


            Swal.fire({
                title: 'Are you sure you want to delete this comment?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/blogs/' + id + '/comment/delete',
                        type: 'DELETE',
                        success: function(response) {
                            $('#commentSection').html(response.comments);
                            Swal.fire(
                                'Deleted!',
                                'Comment has been deleted.',
                                'info'
                            )
                        }
                    });
                }
            });
        });


        
    </script>


</x-admin-layout>
