<x-layout>



                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-8">
                            <div style="border: none;" class="card">
                                <div style="max-height: 450px; overflow: hidden;">
                            
                                    <img style="max-height: 450px; object-fit: cover; object-position: center;"
                                        class="card-img-top" src="/uploads/{{ $blog->image }}" alt="">
                                </div>
                                <div class="">
                                    <div class="d-flex mb-1 mt-4">
                                        <h5 class="card-title fs-3 me-auto">{{ $blog->title }}</h5>
                                        @if (auth()->check())

                                            @if (auth()->user()->likes->contains('blog_id', $blog->id))
                                                <a href="" title="Love" class="removeLove"
                                                    data-id="{{ $blog->id }}"><i
                                                        class="fa-solid fa-heart fs-4 pt-1 me-3 text-danger"></i>
                                                </a>
                                            @else
                                                <a href="" title="Love" class="love"
                                                    data-id="{{ $blog->id }}"><i
                                                        class="fa-regular fa-heart fs-4 pt-1 me-3 text-danger"></i>
                                                </a>
                                            @endif

                                        @endif

                                        @if (auth()->id() == $blog->user_id)
                                            <a class="" href="/blogs/{{ $blog->id }}/edit" title="Edit">
                                                <i style="padding-top: 5px;"
                                                    class="fa-regular fa-pen-to-square fs-5 me-3 text-success"></i>
                                            </a>
                                            <a class="blogDelete" title="Delete" data-id="{{ $blog->id }}">
                                                <i style="padding-top: 5.4px;"
                                                    class="fa-solid fa-trash me-3 fs-5 text-danger"></i>
                                            </a>
                                        @endif

                                    </div>
                                    <div style="color: rgb(109, 105, 105);" class="d-flex mb-3">
                                        <div class="d-flex me-3">
                                            <i style="padding-top: 2px; font-size: 12px;"
                                                class="fa-solid fa-user-secret me-1"></i>
                                            <span style="font-size: 12px;">ADMIN</span>
                                        </div>
                                        <div class="d-flex me-3">
                                            <i style="padding-top: 3px; font-size: 12px;"
                                                class="fa-regular fa-heart me-1"></i>
                                            <span style="font-size: 12px;">{{ $blog->likes->count() }}</span>
                                        </div>
                                        <div class="d-flex me-3">
                                            <i style="padding-top: 3px; font-size: 12px;"
                                                class="fa-regular fa-comment me-1"></i>
                                            <span style="font-size: 12px;">{{ $blog->comments->count() }}</span>
                                        </div>
                                        <div class="d-flex me-3">
                                            <i style="padding-top: 2px; font-size: 12px;"
                                                class="fa-solid fa-calendar-days me-1"></i>
                                            <span
                                                style="font-size: 12px;">{{ $blog->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <p style="line-height: 28px; color:rgb(109, 105, 105)" class="">
                                        {{ $blog->content }}</p>
                                </div>
                                <div class="mt-5 d-flex justify-content-center mb-5">
                                    <div>
                                        <div class="fw-bold mb-2 d-flex justify-content-center">Share This Post :</div>
                                        <div class="d-flex">
                                            <a class="rounded me-2 social-btn"
                                                style="background: rgb(230, 229, 235); padding: 10px 13px;"
                                                href="">
                                                <i class="fa-brands fa-facebook fs-5 text-black"></i>
                                            </a>
                                            <a class="rounded me-2 social-btn"
                                                style="background: rgb(230, 229, 235); padding: 10px 13px;"
                                                href="">
                                                <i class="fa-brands fa-instagram fs-5 text-black"></i>
                                            </a>
                                            <a class="rounded me-2 social-btn"
                                                style="background: rgb(230, 229, 235); padding: 10px 13px;"
                                                href="">
                                                <i class="fa-brands fa-twitter fs-5 text-black"></i>
                                            </a>
                                            <a class="rounded me-2 social-btn"
                                                style="background: rgb(230, 229, 235); padding: 10px 13px;"
                                                href="">
                                                <i class="fa-brands fa-viber fs-5 text-black"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <h5 id="comment" class="card-title">COMMENTS</h5>
                                </div>
                                <div class="">
                                    <form action="/blogs/{{ $blog->id }}/detail/comment#comment" method="POST">
                                        @csrf
                                        <div>
                                            <textarea style="max-height: 130px; min-height: 130px;" placeholder="Write a comment . . ." class="form-control"
                                                name="comment" id=""></textarea>
                                            @error('comment')
                                                <p class="text-danger text-sm ">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <button class="checkout py-2 px-4">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>

                                @include('user.blogs.comment')

                            </div>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>
                </div>
          


    <script>
        function toggleContent(id) {

            const collapsible = document.querySelector('.collapsible' + id);

            const content = document.querySelector('.content' + id);
            //collapsible.classList.toggle('active');
            content.style.display = content.style.display === 'none' ? 'block' : 'none';
            if (collapsible.classList.contains('d-none')) {
                // Remove 'd-none' class
                collapsible.classList.remove('d-none');
            } else {
                collapsible.classList.add('d-none');
            }
        }

        $(document).on('click', '.love', function(a) {
            a.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: '/blogs/' + id + '/detail/like',
                type: 'GET',
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(document).on('click', '.removeLove', function(a) {
            a.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: '/blogs/' + id + '/like/remove',
                type: 'GET',
                success: function() {
                    window.location.reload();
                }
            });
        });

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
                        url: '/blogs/' + id + '/delete',
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
                        url: '/blogs/' + id + '/comment/remove',
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


        $(document).on('click', '.reviewUpdate', function(a) {
            a.preventDefault();
            var id = $(this).data('id');
            var formData = $('#updateReviewForm' + id).serialize(); // Serialize form data



            $.ajax({
                url: '/blogs/' + id + '/comment/update',
                type: 'PATCH',
                data: formData,
                success: function(response) {
                    console.log(response);

                    $('#commentSection').html(response.comments);
                },
                error: function(error) {
                    console.error('Ajax error:', error);
                }
            });
        });
    </script>


</x-layout>
